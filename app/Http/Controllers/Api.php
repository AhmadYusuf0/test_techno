<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\produkModel;
use App\Models\gambarModel;
use App\Models\warnaModel;
use App\Models\ukuranModel;
use App\Models\hargaModel;

use Illuminate\Support\Facades\Validator;
use Session;

class Api extends Controller
{

    public function index()
    {
        echo "index";
    }


    public function getProduk(Request $req)
    {
        var_dump($req->all());
        $produk = produkModel::select('*')->get();
        foreach ($produk as $key) {
            $key->gambar = gambarModel::select('file_gambar')->where('id_produk', '=', $key->id)->get();
            $key->warna = warnaModel::select('nama_warna')->where('id_produk', '=', $key->id)->get();
            $key->ukuran = ukuranModel::select('nama_ukuran')->where('id_produk', '=', $key->id)->get();
            $key->harga = hargaModel::select('nominal_harga')->where('id_produk', '=', $key->id)->get();
        }

        $respon = json_encode($produk);
        return response($respon, 200)->header('Content-Type', 'application/json');
    }

    public function tambahProduk(Request $req)
    {
        $jsonData = $req->getContent();
        $data = json_decode($jsonData, true);

        $validator = Validator::make($req->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            $respon = [
                "message" => "Silakan lengkapi data!",
                "code" => 500,
            ];
            $respon = json_encode($respon);
            return response($respon, 200)->header('Content-Type', 'application/json');
        }

        $result = produkModel::create([
            'nama' => $data['name'],
            'deskripsi' => $data['deskripsi'],
            'kategori' => $data['kategori'],
        ]);


        if ($result) {
            $respon = [
                "message" => "Berhasil menambah data!",
                "code" => 200,
            ];
        } else {
            $respon = [
                "message" => "Gagal menambah data!",
                "code" => 500,
            ];
        }

        $respon = json_encode($respon);
        return response($respon, 200)->header('Content-Type', 'application/json');
    }


    public function editProduk(Request $req)
    {
        $jsonData = $req->getContent();
        $data = json_decode($jsonData, true);

        $validator = Validator::make($req->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            $respon = [
                "message" => "Silakan lengkapi data!",
                "code" => 500,
            ];
            $respon = json_encode($respon);
            return response($respon, 200)->header('Content-Type', 'application/json');
        }

        $result = produkModel::where('id', $data['id'])->update([
            'nama' => $data['name'],
            'deskripsi' => $data['deskripsi'],
            'kategori' => $data['kategori'],
        ]);

        if ($result) {
            $respon = [
                "message" => "Berhasil memperbarui data!",
                "code" => 200,
            ];
        } else {
            $respon = [
                "message" => "Gagal memperbarui data!",
                "code" => 500,
            ];
        }

        $respon = json_encode($respon);
        return response($respon, 200)->header('Content-Type', 'application/json');
    }

    public function cariProduk(Request $req)
    {

        $jsonData = $req->getContent();
        $data = json_decode($jsonData, true);

        $keyword = $data['keyword'];

        $produk = produkModel::select('*')
            ->where(function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', "%$keyword%")
                    ->orWhere('deskripsi', 'LIKE', "%$keyword%")
                    ->orWhereHas('gambar', function ($query) use ($keyword) {
                        $query->where('file_gambar', 'LIKE', "%$keyword%");
                    })
                    ->orWhereHas('warna', function ($query) use ($keyword) {
                        $query->where('nama_warna', 'LIKE', "%$keyword%");
                    })
                    ->orWhereHas('ukuran', function ($query) use ($keyword) {
                        $query->where('nama_ukuran', 'LIKE', "%$keyword%");
                    })
                    ->orWhereHas('harga', function ($query) use ($keyword) {
                        $query->where('nominal_harga', 'LIKE', "%$keyword%");
                    });
            })
            ->get();

        if ($produk) {
            $respon = json_encode($produk);
            return response($respon, 200)->header('Content-Type', 'application/json');
        } else {
            $respon = [
                "message" => "Berhasil memperbarui data!",
                "code" => 200,
            ];
            $respon = json_encode($respon);
            return response($respon, 200)->header('Content-Type', 'application/json');
        }
    }


    public function filterProduk(Request $req)
    {
        $jsonData = $req->getContent();
        $data = json_decode($jsonData, true);

        $kategori = $data['kategori'];
        $produk = produkModel::select('*')
            ->where('kategori', $kategori)
            ->get();

        foreach ($produk as $key) {
            $key->gambar = gambarModel::select('file_gambar')->where('id_produk', '=', $key->id)->get();
            $key->warna = warnaModel::select('nama_warna')->where('id_produk', '=', $key->id)->get();
            $key->ukuran = ukuranModel::select('nama_ukuran')->where('id_produk', '=', $key->id)->get();
            $key->harga = hargaModel::select('nominal_harga')->where('id_produk', '=', $key->id)->get();
        }

        $respon = json_encode($produk);
        return response($respon, 200)->header('Content-Type', 'application/json');
    }

    public function deleteProduk(Request $req)
    {

        $jsonData = $req->getContent();
        $data = json_decode($jsonData, true);

        $deletedRows = produkModel::where('id', $data['id'])->delete();

        if ($deletedRows > 0) {
            $respon = [
                "message" => "Berhasil menghapus data!",
                "code" => 200,
            ];
            $respon = json_encode($respon);
            return response($respon, 200)->header('Content-Type', 'application/json');
        } else {
            $respon = [
                "message" => "Gagal menghapus data!",
                "code" => 500,
            ];
            $respon = json_encode($respon);
            return response($respon, 200)->header('Content-Type', 'application/json');
        }
    }
}
