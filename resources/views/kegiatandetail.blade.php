@extends('layouts.app')

@section('judul')
    Detail Kegiatan <b>{{$kegiatan->judul}}</b>
@endsection

@section('content')
<div class="mt-5">
    <div class="container">
        <div class="row">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">@yield('judul')</h3>
                    <p class="card-text">{!! $kegiatan->isi !!}</p>
                    <p class="card-text">Dibuat : {{ $kegiatan->updated_at->diffForHumans() }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.kegiatan') }}" class="text-dark text-decoration-none"><i class="bi bi-arrow-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection