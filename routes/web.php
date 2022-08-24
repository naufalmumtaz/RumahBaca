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
