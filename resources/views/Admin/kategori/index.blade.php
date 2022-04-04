@extends('layouts.admin.app')
@section('admin.title', 'Admin | Daftar Kategori Postingan')
@section('admin.main-admin')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Kategori</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->parent}}</td>
                                        <td>{{$category->kategori}}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-{{$loop->iteration}}"><i class="fas fa-edit"></i></button>
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

@foreach ($categories as $category)
<div class="modal fade" id="modal-edit-{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('kategori_update', ['id' => $category->id])}}" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-hapus">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Parent</label> <small class="text-danger">*</small>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$category->parent}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Nama Kategori</label> <small class="text-danger">*</small>
                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{$category->kategori}}">
                    @error('kategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
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
            Apakah anda yakin untuk menghapus data {{$category->name}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <a href="{{route('kategori_delete', ['id' => $category->id])}}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endforeach

@endsection