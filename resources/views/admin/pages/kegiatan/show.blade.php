@extends('admin.master')

@section('judul')
    Detail Kegiatan <b>{{$kegiatan->judul}}</b>
@endsection

@section('content')
<div class="card card-dark">
    <div class="card-header">
        {{-- <h3 class="card-title">@yield('judul')</h3><br> --}}
        <p>{{$kegiatan->updated_at->diffForHumans()}}</p>
    </div>
    <div class="card-body" style="white-space:pre-wrap">
        <img src="{{ $kegiatan->gambar ? asset('img/kegiatan/' . $kegiatan->gambar) : 'https://dummyimage.com/600x400/383838/fff' }}" width="900" class="mb-4 mt-2 img-thumbnail">
        <p>{!! $kegiatan->isi !!}</p>
    </div>
    <div class="card-footer">
        <a href="{{ route('kegiatan.index') }}" class="text-dark"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    </div>
</div>
@endsection

