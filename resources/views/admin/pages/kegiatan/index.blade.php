@extends('admin.master')

@section('judul')
    Daftar Kegiatan
@endsection

@section('content')
<div class="form-group d-flex justify-content-between">
    <a href="{{ route('kegiatan.create') }}" class="btn btn-success mb-4">Buat Kegiatan <i class="fa fa-plus ms-1" aria-hidden="true"></i></a>
    <form action="{{ route('kegiatan.index') }}" method="GET">
        <input type="search" class="form-control" name="search" id="search" value="{{ request('search') }}" autocomplete="off" autofocus placeholder="Cari...">
    </form>
</div>
<div class="row">
    @forelse ($kegiatan as $value)
        <div class="col-lg-6">
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
                            <a class="dropdown-item text-primary" href="/kegiatan/{{$value->id}}">Detail</a>
                            <a class="dropdown-item text-primary" href="/kegiatan/{{$value->id}}/edit">Ubah</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('kegiatan.destroy', $value->id) }}" onclick="event.preventDefault();
                            document.getElementById('delete-form-{{ $value->id }}').submit();">Hapus</a>

                            <form id="delete-form-{{ $value->id }}" action="{{ route('kegiatan.destroy', $value->id) }}"
                                method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body d-flex flex-column pt-3">
                    <p>{!! Str::limit($value->isi, 200, $end='...') !!}</p>
                    <p>Dibuat : {{ $value->updated_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    @empty
        <h4 class="text-center py-4">Kegiatan belum dibuat</h4>
    @endforelse
</div>
@endsection



