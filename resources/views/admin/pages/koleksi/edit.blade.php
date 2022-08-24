@extends('admin.master')

@section('judul')
    Edit Koleksi
@endsection

@section('content')
    <form action="{{ route('koleksi.update', $koleksi->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" autocomplete="off" required value="{{ $koleksi->judul }}">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="form-group">
                    <textarea name="deskripsi" id="deskripsi" placeholder="Deskripsi" class="form-control" style="resize:none;">{{ $koleksi->deskripsi }}</textarea>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">---Pilih Kategori---</option>
                        @forelse ($kategori as $item)
                            @if ($item->id == $koleksi->kategori_id)
                                <option value="{{ $item->id }}" selected>{{ $item->judul }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->judul }}</option>
                            @endif
                        @empty
                            <p class="text-center">Kategori belum dibuat</p>
                        @endforelse
                    </select>
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



