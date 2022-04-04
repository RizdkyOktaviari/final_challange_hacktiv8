@extends('layouts.admin.app')
@section('admin.title', 'Admin | Tambah Berita atau Postingan')
@section('admin.main-admin')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Berita atau Postingan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Berita atau Postingan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <td>Gambar</td>
                                    <td>Nama</td>
                                    <td>Kategori</td>
                                    <td>Berat</td>
                                    <td>Harga</td>
                                    <td>Status</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td> <img src="{{asset($post->image)}}" alt="{{$post->image}}" width="50" height="50"> </td>
                                        <td>{{$post->nama}}</td>
                                        <td>{{$post->kategori->parent}}</td>
                                        <td>{{($post->Berat)}}</td>
                                        <td>{{($post->harga)}}</td>
                                        <td>{{($post->status)}}</td>

                                        <td>
                                            <a href="{{route('produk_edit',['id' => $post->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus-{{$loop->iteration}}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($posts as $post)
<div class="modal fade" id="modal-edit-{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="#" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-hapus">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-hapus-{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-hapus">Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Apakah anda yakin untuk menghapus data {{$post->name}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <a href="{{route('produk_delete', ['id' => $post->id])}}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach
@endsection