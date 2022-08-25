@extends('layouts.app')

@section('judul')
  Beranda
@endsection

@section('content')
    <div class="jumbotron">
      <div class="container text-center">
        <h1 class="display-4 mb-2">Perpustakaan <span class="fw-bold">Berbasis <br> Komunitas</span></h1>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 search-panel text-center" style="margin-top: -40px">
          <h4 class="fs-4 fw-light mb-3">Cari Koleksi</h4>
          <form class="d-flex">
            <input class="form-control me-2" name="search" type="search" placeholder="Cari" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Cari</button>
          </form>
        </div>
      </div>
    </div>

    <section class="about">
      <div class="container">
        <div class="row text-center">
          <h2>Tentang Kami</h2>
        </div>
        <div class="row mt-4 justify-content-center">
          <div class="col-lg-6 col-sm-12">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt odio vitae saepe perspiciatis laboriosam ullam eligendi accusantium necessitatibus asperiores voluptate rem maxime inventore fugiat, reiciendis corporis, suscipit vel odit corrupti maiores enim assumenda.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima itaque vitae incidunt quas quasi! Reprehenderit veniam consequuntur odit placeat libero!</p>
          </div>
          <div class="col-lg-6 col-sm-12">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/-Zs9pBRtOqY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>

    <section class="feature overflow-hidden">
      <div class="row">
        <div class="col-lg-6 col-sm-12 d-sm-none d-lg-block" style="background: url(../img/jumbotron/1.avif) no-repeat; background-position: -180px 0px; height:20em"></div>
        <div class="col-lg-6 col-sm-12 bg-grey text-dark p-5">
          <h2>Koleksi</h2>
          <p class="mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore eum non illum voluptatem nobis asperiores excepturi sint placeat. Tempore quibusdam beatae obcaecati ratione, quaerat numquam tenetur, cum ab ea quas similique eaque sit a, eum repudiandae voluptatem qui quos possimus dolor incidunt nam voluptas itaque ducimus quis. Sit, exercitationem voluptates.
          </p>
          <a href="" class="text-decoration-none text-dark mt-2">Selengkapnya</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-sm-12 bg-grey text-dark p-5 text-end">
          <h2>Kegiatan</h2>
          <p class="mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore eum non illum voluptatem nobis asperiores excepturi sint placeat. Tempore quibusdam beatae obcaecati ratione, quaerat numquam tenetur, cum ab ea quas similique eaque sit a, eum repudiandae voluptatem qui quos possimus dolor incidunt nam voluptas itaque ducimus quis. Sit, exercitationem voluptates.
          </p>
          <a href="" class="text-decoration-none text-dark mt-2">Selengkapnya</a>
        </div>
        <div class="col-lg-6 col-sm-12 d-sm-none d-lg-block" style="background: url(../img/jumbotron/1.avif) no-repeat; background-position: -180px 0px; height:20em"></div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-sm-12 d-sm-none d-lg-block" style="background: url(../img/jumbotron/1.avif) no-repeat; background-position: -180px 0px; height:20em"></div>
        <div class="col-lg-6 col-sm-12 bg-grey text-dark p-5">
          <h2>Artikel</h2>
          <p class="mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore eum non illum voluptatem nobis asperiores excepturi sint placeat. Tempore quibusdam beatae obcaecati ratione, quaerat numquam tenetur, cum ab ea quas similique eaque sit a, eum repudiandae voluptatem qui quos possimus dolor incidunt nam voluptas itaque ducimus quis. Sit, exercitationem voluptates.
          </p>
          <a href="" class="text-decoration-none text-dark mt-2">Selengkapnya</a>
        </div>
      </div>
    </section>

    <section class="gabung overflow-hidden">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="fs-3">Mau Bergabung?</h1>
          <a href="" class="btn btn-dark mt-3">Kontak</a>
        </div>
      </div>
    </section>
@endsection


