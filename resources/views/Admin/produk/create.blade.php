@extends('layouts.admin.app')
@section('admin.title', 'Admin | Tambah Berita atau Postingan')
@section('admin.main-admin')
<style>
    input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button { 
	-webkit-appearance: none;
}
</style>
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Berita atau Postingan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{route('produk_store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label> <small class="text-danger">*</small>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{old('nama')}}">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label> <small class="text-danger">*</small> <small> <a href="" data-toggle="modal" data-target="#modal-category">Tambah Kategori</a> </small>
                            <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                                <option value="" selected>Select Option</option>
                                @foreach ($categories as $kategori)
                                <option value="{{$kategori->id}}" {{old('kategori') == $kategori->id ? 'selected' : ''}}>{{$kategori->kategori}}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat</label> <small class="text-danger">*</small>      <div class="input-group">
                            <input type="number" class="form-control @error('berat') is-invalid @enderror" id="berat" name="berat" value="{{old('berat')}}">  <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Kg</span>
                            </div></div>
                            @error('berat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label> <small class="text-danger">*</small>
                            <div class="input-group"><div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Rp</span></div>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{old('harga')}}">                      </div>

                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label> <small class="text-danger">*</small>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="" selected>Select Option</option>
                                <option value="Draft">Draft</option>
                                <option value="Sending">Sending</option>
                                <option value="Pending">Pending</option>

                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Fitur</label>
                            <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images">
                            <small class="form-text text-muted mt-2">Maks 2mb</small>
                            @error('images')
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

<div class="modal fade" id="modal-category" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('kategori_store')}}" method="POST" id="form-kategori">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modal-hapus">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="parent">Nama parent</label> <small class="text-danger">*</small>
                    <input type="text" class="form-control @error('parent') is-invalid @enderror" id="parent" name="parent" value="{{old('parent')}}">
                    @error('parent')
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('admin.script')
<script>
    $(document).ready(function(){
        $('#form-kategori').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{route('kategori_storeajax')}}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    $('#modal-category').modal('hide');
                    $('#kategori').append(`<option value="${data.id}">${data.kategori}</option>`);
                    $('#kategori').val(data.id).trigger('change');
                }
            });
        })
    });
</script>
@endsection