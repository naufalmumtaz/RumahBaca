<?php

namespace App\Http\Controllers;

use App\Koleksi;
use App\Kategori;
use Illuminate\Http\Request;
use File;

class KoleksiController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $koleksi = Koleksi::all();

        if(request('search')) {
            $koleksi = Koleksi::where('judul', 'LIKE', '%' . request('search') . '%')->orWhere('deskripsi', 'LIKE', '%' . request('search') . '%')->get();
        } else {
            $koleksi = Koleksi::latest()->get();
        }

        return view('admin.pages.koleksi.index', compact('koleksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.pages.koleksi.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    		'judul' => 'required|max:100',
    		'deskripsi' => 'required|max:500',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		'kategori_id' => 'required'
        ]);
        
        $namaGambar = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('img/koleksi'), $namaGambar);

        Koleksi::create([
    		'judul' => $request->judul,
    		'deskripsi' => $request->deskripsi,
            'gambar' => $namaGambar,
            'kategori_id' => $request->kategori_id
    	]);
 
    	return redirect('/koleksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $koleksi = Koleksi::find($id);
        $kategori = Kategori::all();
        return view('admin.pages.koleksi.edit', compact('koleksi', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
    		'judul' => 'required|max:100',
    		'deskripsi' => 'required|max:500',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		'kategori_id' => 'required'
        ]);

        $koleksi = Koleksi::find($id);

        if($request->has('gambar')) {
            $namaGambar = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('img/koleksi'), $namaGambar);
            
            $koleksi->judul = $request->judul;
            $koleksi->deskripsi = $request->deskripsi;
            $koleksi->gambar = $namaGambar;
            $koleksi->kategori_id = $request->kategori_id;
        } else {
            $koleksi->judul = $request->judul;
            $koleksi->deskripsi = $request->deskripsi;
            $koleksi->kategori_id = $request->kategori_id;
        }

        $koleksi->update();

        return redirect('/koleksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $koleksi = Koleksi::find($id);
        
        $path = 'img/koleksi/';
        File::delete($path . $koleksi->gambar);
        
        $koleksi->delete();
        return redirect('/koleksi');
    }
}
