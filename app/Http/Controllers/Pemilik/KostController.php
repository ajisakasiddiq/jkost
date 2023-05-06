<?php

namespace App\Http\Controllers\Pemilik;

use App\Http\Requests\DataKostRequest;
use App\Http\Controllers\Controller;
use App\Models\DataKost;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.pemilik.pemilik-dataKost');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [],
            []
        );
        $datakamar = new DataKost();

        $fileNameFotoPertama = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/pemilik/'), $fileNameFotoPertama);
        $datakamar->user_id = $request->user_id;
        $datakamar->nama_kost = $request->nama_kost;
        $datakamar->alamat = $request->alamat;
        $datakamar->deskripsi = $request->deskripsi;
        $datakamar->foto = $request->foto;
        $datakamar->maps = $request->maps;
        $datakamar->status = $request->status;
        $datakamar->longitude = $request->longitude;
        $datakamar->latitude = $request->latitude;
        $datakamar->save();
        return redirect()->route('data-kost');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
