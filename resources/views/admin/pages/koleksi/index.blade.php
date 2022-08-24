@extends('admin.master')

@section('judul')
    Daftar Koleksi
@endsection

@section('content')
<div class="form-group d-flex justify-content-between">
    <a href="{{ route('koleksi.create') }}" class="btn btn-success mb-4">Buat Koleksi <i class="fa fa-plus ms-1" aria-hidden="true"></i></a>
    <form action="{{ route('koleksi.index') }}" method="GET">
        <input type="search" class="form-control" name="search" id="search" value="{{ request('search') }}" autocomplete="off" autofocus placeholder="Cari...">
    </form>
</div>
<div class="row">
    @forelse ($koleksi as $value)
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold">{{ $value->judul }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Pengaturan</div>
                            <a class="dropdown-item text-primary" href="/koleksi/{{$value->id}}/edit">Ubah</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('koleksi.destroy', $value->id) }}" onclick="event.preventDefault();
                            document.getElementById('delete-form-{{ $value->id }}').submit();">Hapus</a>

                            <form id="delete-form-{{ $value->id }}" action="{{ route('koleksi.destroy', $value->id) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column pt-3">
                    <img src="{{ asset('img/koleksi/' . $value->gambar) }}" class="card-img-top w-100 mb-3" alt="img">
                    <p>{!! $value->deskripsi !!}</p>
                    <p>Kategori : <span class="text-success">{{ $value->kategori->judul }}</span></p>
                    <p>Dibuat : {{ $value->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    @empty
        <h4 class="text-center py-4">Koleksi belum dibuat</h4>
    @endforelse
</div>

@endsection



