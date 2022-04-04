@extends('layouts.admin.app')
@section('admin.title', 'Admin | Tambah Kategori')
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{route('kategori_store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Parent</label> <small class="text-danger">*</small>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label> <small class="text-danger">*</small>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{old('kategori')}}">
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection