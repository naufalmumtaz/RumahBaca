@extends('layouts.app')

@section('judul')
  Daftar Kegiatan
@endsection

@section('content')
  <div class="koleksi mt-5">
    <div class="container">
      <div class="row">
        <h2 class="d-flex justify-content-between">@yield('judul') <form action="{{ route('user.kegiatan') }}" method="GET">
          <input type="search" class="form-control" name="search" id="search" value="{{ request('search') }}" autocomplete="off" autofocus placeholder="Cari...">
      </form></h2>
      </div>
      <div class="row mt-4">
        @forelse ($kegiatan as $item)
          <div class="col-lg-12 mb-3">
            <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
              <div class="col-auto d-none d-lg-block">
                <img src="{{ asset('img/kegiatan/' . $item->gambar) }}" alt="img" width="210">
              </div>
              <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{ $item->judul }}</h3>
                <div class="mb-1 text-muted">{{ $item->updated_at->diffForHumans() }}</div>
                <p class="card-text mb-auto">{!! Str::limit($item->isi, 340, $end='...') !!}</p>
                <a href="{{ route('user.kegiatan.detail', $item->id) }}" class="stretched-link text-decoration-none">Baca</a>
              </div>
            </div>
          </div>
        @empty
            <h4 class="text-center">Kegiatan tidak ditemukan!</h4>
        @endforelse
      </div>
    </div>
  </div>
@endsection


