<?php

namespace App\Http\Controllers;

use App\Models\eBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $bukus = eBook::latest()->paginate(10);
        return view('eBook.index', compact('bukus'));
    }

    public function create()
    {
    return view('eBook.create');
    }

    public function store(Request $request)
    {
    $this->validate($request, [
        'judul_buku' => 'required',
        'image'      => 'required|image|mimes:png,jpg,jpeg',
        'penulis'    => 'required',
        'resensi'    => 'required',
        'penerbit'   => 'required',
        'thn_terbit' => 'required',
        'kategori'   => 'required',
        'buku'       => 'required'
    ]);
    
    //upload image
    $image = $request->file('image');
    $image->storeAs('public/img', $image->hashName());

    $buku = eBook::create([
        'judul_buku' => $request->judul_buku,
        'image'      => $image->hashName(),
        'penulis'    => $request->penulis,
        'resensi'    => $request->resensi,
        'penerbit'   => $request->penerbit,
        'thn_terbit' => $request->thn_terbit,
        'kategori'   => $request->kategori,
        'buku'       => $request->buku
    ]);

    if($buku){
        //redirect dengan pesan sukses
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('buku.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
    }

    public function edit(eBook $buku)
    {
        return view('eBook.edit', compact('buku'));
    }

    public function update(Request $request, eBook $buku)
{
    $this->validate($request, [
        'judul_buku' => 'required',
        'penulis'    => 'required',
        'resensi'    => 'required',
        'penerbit'   => 'required',
        'thn_terbit' => 'required',
        'kategori'   => 'required',
        'buku'       => 'required'
    ]);

    //get data Blog by ID
    $buku = eBook::findOrFail($buku->id);

    if($request->file('image') == "") {

        $buku->update([
            'judul_buku' => $request->judul_buku,
            'penulis'    => $request->penulis,
            'resensi'    => $request->resensi,
            'penerbit'   => $request->penerbit,
            'thn_terbit' => $request->thn_terbit,
            'kategori'   => $request->kategori,
            'buku'       => $request->buku
        ]);

    } else {

        //hapus old image
        Storage::disk('local')->delete('public/img/'.$buku->image);

        //upload new image
        $image = $request->file('image');
        $image->storeAs('public/img', $image->hashName());

        $buku->update([
            'image'      => $image->hashName(),
            'judul_buku' => $request->judul_buku,
            'penulis'    => $request->penulis,
            'resensi'    => $request->resensi,
            'penerbit'   => $request->penerbit,
            'thn_terbit' => $request->thn_terbit,
            'kategori'   => $request->kategori,
            'buku'       => $request->buku
        ]);

    }

    if($buku){
        //redirect dengan pesan sukses
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('buku.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

        public function destroy($id) {

        $buku = eBook::findOrFail($id);
        Storage::disk('local')->delete('public/img/'.$buku->image);
        $buku->delete();

        if($buku){
            //redirect dengan pesan sukses
            return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('buku.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}