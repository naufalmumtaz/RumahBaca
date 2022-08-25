@extends('admin.master')

@section('judul')
    Daftar Kategori
@endsection

@section('content')
<a href="/kategori/create" class="btn btn-success mb-4">Buat Kategori <i class="fa fa-plus ms-1" aria-hidden="true"></i></a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Tanggal Dibuat</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $key=>$value)
                        <tr>
                            <td>{{$key + 1}}</th>
                                <td>{{$value->judul}}</td>
                                <td>{!!$value->isi!!}</td>
                                <td>{{$value->created_at}}</td>
                                <td>
                                    <form action="/kategori/{{$value->id}}" method="POST">
                                        <a href="/kategori/{{$value->id}}/edit" class="btn btn-primary">Ubah</a>
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger my-1" value="Hapus">
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



