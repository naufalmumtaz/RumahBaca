@extends('admin.master')

@section('judul')
    Edit Kegiatan
@endsection

@section('content')
    <form method="post" action="{{ route('kegiatan.update', $kegiatan->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8 col-sm-12">
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible mb-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Error : </h5>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <div class="col-lg-8 col-sm-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="judul" id="isi" placeholder="Judul" autocomplete="off" required value="{{ $kegiatan->judul }}">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="form-group">
                    <textarea name="isi" id="isi" cols="30" rows="10" placeholder="Isi" class="form-control" style="resize:none;">{{ $kegiatan->isi }}</textarea>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control-file" name="gambar" id="gambar">
                  </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </div>
    </form>
@endsection



