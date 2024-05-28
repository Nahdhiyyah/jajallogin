<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pinjam;
use App\Models\eBook;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $pinjam = Pinjam::latest()->paginate(10);
        // return view('peminjaman', compact('pinjams'));

        $pinjams = Pinjam::all();
        return view('peminjaman', compact('pinjams'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjams = new Pinjam;
        return view('tabelPinjam', compact(
            'pinjams'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $tanggal = date(yy-mm-dd);
        $pinjams = new Pinjam();
        $pinjams->id = $request->id;
        $pinjams->user_id = $request->user_id;
        $pinjams->buku_id = $request->buku_id;
        $pinjams->judul_buku = $request->judul_buku;
        $pinjams->buku = $request->buku;
        $pinjams->waktu_pinjam = $request->waktu_pinjam;
        $pinjams->petugas = $request->petugas;


        $pinjams->save();
        Log::info('kamu berhasil meminjam buku!');
        return redirect('pinjam');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pinjams = Pinjam::find($id);
        return view('book')->with('pinjam', $pinjams);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjams = Pinjam::find($id);
        $pinjams->delete();
        return redirect('pinjam');
    }
}