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

class Produk extends Controller
{
    public function index()
    {
        $produk = produkModel::select('*')->get();
        foreach ($produk as $key) {
            $key->gambar = gambarModel::select('file_gambar')->where('id_produk', '=', $key->id)->get();
            $key->warna = warnaModel::select('nama_warna')->where('id_produk', '=', $key->id)->get();
            $key->ukuran = ukuranModel::select('nama_ukuran')->where('id_produk', '=', $key->id)->get();
            $key->harga = hargaModel::select('nominal_harga')->where('id_produk', '=', $key->id)->get();
        }
        $data['produk'] = $produk;
        return view('admin/produk', $data);
    }

    public function action_produk($id = '')
    {
        $title = 'Tambah ';
        $action_url = 'action_tambah_produk';

        if (!empty($id)) {
            $title = 'Edit ';
            $action_url = 'action_edit_produk';
            $data['produk'] = produkModel::select('*')->where('id', $id)->first();
        }

        $data['title'] = $title;
        $data['action_url'] = $action_url;

        return view('admin/produk_form', $data);
    }

    public function action_tambah_produk(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('tambah_produk')
                ->withErrors($validator)
                ->withInput();
        }

        if ($req->has('save')) {

            $produk = produkModel::create([
                'nama' => $req->input('nama'),
                'deskripsi' => $req->input('deskripsi'),
                'kategori' => $req->input('kategori'),
            ]);

            $id_produk = $produk->id;
            if (!empty($req->input('file_gambar'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar')
                ]);
            }
            if (!empty($req->input('file_gambar1'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar1')
                ]);
            }
            if (!empty($req->input('file_gambar2'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar2')
                ]);
            }
            if (!empty($req->input('file_gambar3'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar3')
                ]);
            }
            if (!empty($req->input('file_gambar4'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar4')
                ]);
            }


            if (!empty($req->input('nama_warna'))) {
                warnaModel::create([
                    'id_produk' => $id_produk,
                    'nama_warna' => $req->input('nama_warna')
                ]);
            }
            if (!empty($req->input('nama_warna2'))) {
                warnaModel::create([
                    'id_produk' => $id_produk,
                    'nama_warna' => $req->input('nama_warna2')
                ]);
            }
            if (!empty($req->input('nama_warna3'))) {
                warnaModel::create([
                    'id_produk' => $id_produk,
                    'nama_warna' => $req->input('nama_warna3')
                ]);
            }
            if (!empty($req->input('nama_warna4'))) {
                warnaModel::create([
                    'id_produk' => $id_produk,
                    'nama_warna' => $req->input('nama_warna4')
                ]);
            }

            if (!empty($req->input('nama_ukuranS'))) {
                $ukuran = ukuranModel::create([
                    'id_produk' => $id_produk,
                    'nama_ukuran' => $req->input('nama_ukuranS')
                ]);
                $id_ukuran = $ukuran->id;
                hargaModel::create([
                    'id_produk' => $id_produk,
                    'id_ukuran' => $id_ukuran,
                    'nominal_harga' => $req->input('nominal_hargaS')
                ]);
            }
            if (!empty($req->input('nama_ukuranM'))) {
                $ukuran = ukuranModel::create([
                    'id_produk' => $id_produk,
                    'nama_ukuran' => $req->input('nama_ukuranM')
                ]);
                $id_ukuran = $ukuran->id;
                hargaModel::create([
                    'id_produk' => $id_produk,
                    'id_ukuran' => $id_ukuran,
                    'nominal_harga' => $req->input('nominal_hargaM')
                ]);
            }
            if (!empty($req->input('nama_ukuranL'))) {
                $ukuran = ukuranModel::create([
                    'id_produk' => $id_produk,
                    'nama_ukuran' => $req->input('nama_ukuranL')
                ]);
                $id_ukuran = $ukuran->id;
                hargaModel::create([
                    'id_produk' => $id_produk,
                    'id_ukuran' => $id_ukuran,
                    'nominal_harga' => $req->input('nominal_hargaL')
                ]);
            }
            if (!empty($req->input('nama_ukuranXL'))) {
                $ukuran = ukuranModel::create([
                    'id_produk' => $id_produk,
                    'nama_ukuran' => $req->input('nama_ukuranXL')
                ]);
                $id_ukuran = $ukuran->id;
                hargaModel::create([
                    'id_produk' => $id_produk,
                    'id_ukuran' => $id_ukuran,
                    'nominal_harga' => $req->input('nominal_hargaXL')
                ]);
            }
            if (!empty($req->input('nama_ukuranXXL'))) {
                $ukuran = ukuranModel::create([
                    'id_produk' => $id_produk,
                    'nama_ukuran' => $req->input('nama_ukuranXXL')
                ]);
                $id_ukuran = $ukuran->id;
                hargaModel::create([
                    'id_produk' => $id_produk,
                    'id_ukuran' => $id_ukuran,
                    'nominal_harga' => $req->input('nominal_hargaXXL')
                ]);
            }

            return redirect()->route('produk');
        }
    }

    public function action_edit_produk(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit_produk')
                ->withErrors($validator)
                ->withInput();
        }

        if ($req->has('save')) {

            produkModel::where('id', $req->input('id'))->update([
                'nama' => $req->input('nama'),
                'deskripsi' => $req->input('deskripsi'),
                'kategori' => $req->input('kategori'),
            ]);

            $id_produk = $req->input('id');
            if (!empty($req->input('file_gambar'))) {
                gambarModel::where('id_produk', $req->input('id'))->update([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar')
                ]);
            }
            if (!empty($req->input('file_gambar1'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar1')
                ]);
            }
            if (!empty($req->input('file_gambar2'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar2')
                ]);
            }
            if (!empty($req->input('file_gambar3'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar3')
                ]);
            }
            if (!empty($req->input('file_gambar4'))) {
                gambarModel::create([
                    'id_produk' => $id_produk,
                    'file_gambar' => $req->input('file_gambar4')
                ]);
            }

            return redirect()->route('produk');
        }
    }

    public function action_del_produk(Request $req)
    {
        produkModel::where('id', $req->input('del'))->delete();
        return redirect()->route('produk');
    }
}
