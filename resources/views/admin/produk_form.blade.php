@extends('template')

@section('title', 'Produk')
@section('menu', 'produk')
<!-- @section('add_btn')@stop -->
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h4>Form Produk</h4>
            </div>
            <div class="card-body">
                @error('nama')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @error('deskripsi')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @error('nama_warna')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                @error('nama_ukuran')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
                <form method="post" action="{{ route($action_url) }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Nama Produk</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Kategori</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="kategori">
                                <option value="Pakaian">Pakaian</option>
                                <option value="Celana">Celana</option>
                                <option value="Topi">Topi</option>
                                <option value="Jas">Jas</option>
                                <option value="Sepatu">Sepatu</option>
                                <option value="Jaket">Jaket</option>
                                <option value="Tas">Tas</option>
                                <option value="Dompet">Dompet</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="deskripsi" value="">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Gambar</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="file_gambar" value="" placeholder="Gambar 1"><br>
                            <input type="hidden" name="id" value="{{isset($produk->id) ? $produk->id: ''}}">
                            <input class="form-control" type="text" name="file_gambar1" value="" placeholder="Gambar 2"><br>
                            <input type="hidden" name="id" value="{{isset($produk->id) ? $produk->id: ''}}">
                            <input class="form-control" type="text" name="file_gambar2" value="" placeholder="Gambar 3"><br>
                            <input type="hidden" name="id" value="{{isset($produk->id) ? $produk->id: ''}}">
                            <input class="form-control" type="text" name="file_gambar3" value="" placeholder="Gambar 4"><br>
                            <input type="hidden" name="id" value="{{isset($produk->id) ? $produk->id: ''}}">
                            <input class="form-control" type="text" name="file_gambar4" value="" placeholder="Gambar 5"><br>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Warna</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="checkbox" id="warna" name="nama_warna" value="Merah">
                            <label for="warna">Merah</label><br>
                            <input type="checkbox" id="warna" name="nama_warna2" value="Biru">
                            <label for="warna">Biru</label><br>
                            <input type="checkbox" id="warna" name="nama_warna3" value="Hitam">
                            <label for="warna">Hitam</label><br>
                            <input type="checkbox" id="warna" name="nama_warna4" value="Abu-abu">
                            <label for="warna">Abu-abu</label><br>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Ukuran</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="checkbox" id="ukuran" name="nama_ukuranS" value="S">
                            <label for="ukuran">S</label><br>
                            <input class="form-control" type="text" name="nominal_hargaS" value="" placeholder="Harga Ukuran S">
                            <input type="checkbox" id="ukuran" name="nama_ukuranM" value="M">
                            <label for="ukuran">M</label><br>
                            <input class="form-control" type="text" name="nominal_hargaM" value="" placeholder="Harga Ukuran M">
                            <input type="checkbox" id="ukuran" name="nama_ukuranL" value="L">
                            <label for="ukuran">L</label><br>
                            <input class="form-control" type="text" name="nominal_hargaL" value="" placeholder="Harga Ukuran L">
                            <input type="checkbox" id="ukuran" name="nama_ukuranXL" value="XL">
                            <label for="ukuran">XL</label><br>
                            <input class="form-control" type="text" name="nominal_hargaXL" value="" placeholder="Harga Ukuran XL">
                            <input type="checkbox" id="ukuran" name="nama_ukuranXXL" value="XXL">
                            <label for="ukuran">XXL</label><br>
                            <input class="form-control" type="text" name="nominal_hargaXXL" value="" placeholder="Harga Ukuran XXL">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <button class="btn btn-danger btn-xs">Batal</button>&ensp;
                            <input type="hidden" name="id" value="{{isset($produk->id) ? $produk->id: ''}}">
                            <button type="submit" class="btn btn-info btn-xs" name="save" value="1">Simpan</button>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop