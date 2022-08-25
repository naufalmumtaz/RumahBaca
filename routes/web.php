<?php

use App\Koleksi;
use App\Kategori;
use App\Kegiatan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', function() {
        $jml_kategori = Kategori::count();
        $jml_koleksi = Koleksi::count();
        $jml_kegiatan = Kegiatan::count();

        return view('admin.pages.beranda', compact('jml_kategori', 'jml_koleksi', 'jml_kegiatan'));
    })->name('beranda');

    Route::resource('/kategori', 'KategoriController');
    Route::resource('/koleksi', 'KoleksiController');
    Route::resource('/kegiatan', 'KegiatanController');
});

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function() {
    return view('home');
})->name('home');

Route::get('/user/koleksi', function() {
    $kategori = Kategori::all();

    if(request('search')) {
        $koleksi = Koleksi::where('judul', 'LIKE', '%' . request('search') . '%')->orWhere('deskripsi', 'LIKE', '%' . request('search') . '%')->orWhere('kategori_id', 'LIKE', '%' . request('search') . '%')->get();
    } else {
        $koleksi = Koleksi::latest()->get();
    }

    return view('koleksi', compact('kategori', 'koleksi'));
})->name('user.koleksi');

Route::get('/user/koleksi/{kategori}', function(Kategori $kategori) {
    $koleksi = Koleksi::where('kategori_id', $kategori->id)->get();
    $kategori = Kategori::all();

    return view('koleksi', compact('koleksi', 'kategori'));
})->name('user.koleksi.kategori');

Route::get('/user/kegiatan', function() {
    if(request('search')) {
        $kegiatan = Kegiatan::where('judul', 'LIKE', '%' . request('search') . '%')->orWhere('isi', 'LIKE', '%' . request('search') . '%')->get();
    } else {
        $kegiatan = Kegiatan::latest()->get();
    }

    return view('kegiatan', compact('kegiatan'));
})->name('user.kegiatan');

Route::get('/user/kegiatan/{id}', function($id) {
    $kegiatan = Kegiatan::find($id);

    return view('kegiatandetail', compact('kegiatan'));
})->name('user.kegiatan.detail');



