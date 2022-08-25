@extends('layouts.app')

@section('judul')
  Daftar Koleksi
@endsection

@section('content')
  <div class="koleksi mt-5">
    <div class="container">
      <div class="row">
        <h2 class="d-flex justify-content-between">@yield('judul') <form action="{{ route('user.koleksi') }}" method="GET">
          <input type="search" class="form-control" name="search" id="search" value="{{ request('search') }}" autocomplete="off" autofocus placeholder="Cari...">
      </form></h2>

        <nav class="nav justify-content-center bg-grey mb-4 mt-3 text-uppercase">
          @foreach ($kategori as $item)
            <a class="nav-link text-dark" href="{{ route('user.koleksi.kategori', $item->id) }}">{{ $item->judul }}</a>
          @endforeach
        </nav>
      </div>
      <div class="row">
        @forelse ($koleksi as $item)
          <div class="col-lg-4 col-sm-12">
            <div class="card shadow-sm">
              <img src="{{ asset('img/koleksi/' . $item->gambar) }}" class="card-img-top" alt="img">
              <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-text">{!! $item->deskripsi !!}</p>
                <p class="card-text">Kategori : <span class="text-success">{{ $item->kategori->judul }}</span></p>
                <p class="card-text">Dibuat : {{ $item->updated_at->diffForHumans() }}</p>
              </div>
            </div>
          </div>
        @empty
            <h4 class="text-center">Koleksi tidak ditemukan!</h4>
        @endforelse
      </div>
    </div>
  </div>
@endsection


