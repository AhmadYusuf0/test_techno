@extends('template')

@section('title', 'Produk')
@section('menu', 'produk')
<!-- @section('add_btn')@stop -->
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('tambah_produk') }}" class="btn btn-success" style="float:left;margin-right:4px;">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-content">
                <h3>Produk</h3>
                <hr>
                <form method="post" action="{{ route('action_del_produk') }}">
                    @csrf
                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th class="tb-no">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produk as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    @foreach($item->gambar as $key)
                                    <img src="{{ $key->file_gambar }}" style="width: 100px;"></img>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->warna as $key)
                                    {{ $key->nama_warna }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->ukuran as $key)
                                    {{ $key->nama_ukuran }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($item->harga as $key)
                                    {{ $key->nominal_harga }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ url('edit_produk/'.$item->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" name="del" value="{{ $item->id }}">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
@stop