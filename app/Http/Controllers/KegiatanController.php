<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use File;

class KegiatanController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('search')) {
            $kegiatan = Kegiatan::where('judul', 'LIKE', '%' . request('search') . '%')->orWhere('isi', 'LIKE', '%' . request('search') . '%')->get();
        } else {
            $kegiatan = Kegiatan::latest()->get();
        }

        return view('admin.pages.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.pages.kegiatan.create', compact('kegiatan'));
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
    		'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        
        $namaGambar = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('img/kegiatan'), $namaGambar);

        kegiatan::create([
    		'judul' => $request->judul,
    		'isi' => $request->isi,
            'gambar' => $namaGambar
    	]);
 
    	return redirect('/kegiatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('admin.pages.kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('admin.pages.kegiatan.edit', compact('kegiatan'));
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
    		'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $kegiatan = Kegiatan::find($id);

        if($request->has('gambar')) {
            $namaGambar = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('img/kegiatan'), $namaGambar);
            
            $kegiatan->judul = $request->judul;
            $kegiatan->isi = $request->isi;
            $kegiatan->gambar = $namaGambar;
        } else {
            $kegiatan->judul = $request->judul;
            $kegiatan->isi = $request->isi;
        }

        $kegiatan->update();

        return redirect('/kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        
        $path = 'img/kegiatan/';
        File::delete($path . $kegiatan->gambar);
        
        $kegiatan->delete();
        return redirect('/kegiatan');
    }
}
