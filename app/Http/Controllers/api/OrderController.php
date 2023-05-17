<?php

namespace App\Http\Controllers\API;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  DB::table('data_kamar')
            ->select(
                'data_kost.status as status_kost',
                'data_kamar.status as status_kamar',
                'data_kost.nama_kost',
                'data_kost.alamat',
                'data_kost.deskripsi as deskripsi_kost',
                'data_kost.nama_kost',
                'data_kost.slug',
                'data_kost.longitude',
                'data_kost.latitude',
                'data_kamar.jenis_kamar',
                'data_kamar.no_kamar',
                'data_kamar.harga',
                'data_kamar.img_pertama',
                'data_kamar.img_kedua',
                'data_kamar.img_ketiga',
                'data_kamar.img_keempat',
                'data_kamar.deskripsi as deskripsi_kamar'
            )
            ->leftJoin('data_kost', 'data_kost.id', '=', 'data_kamar.kost_id')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil tampil',
            'data' => $data
        ]);
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
        $request->validate([
            'user_id' => 'required|numeric',
            'kamar_id' => 'required|numeric',
            'nama_pemesan' => 'required|max:100',
            'durasi_sewa' => 'required|int',
            'total_price' => 'required|int',
            'tgl_sewa' => 'required|date',
            // 'status' => 'required|in:unpaid',
        ]);

        // Membuat produk baru
        $order = Transaction::create([
            'user_id' => $request->input('user_id'),
            'kamar_id' => $request->input('kamar_id'),
            'nama_pemesan' => $request->input('nama_pemesan'),
            'durasi_sewa' => $request->input('durasi_sewa'),
            'total_price' => $request->input('total_price'),
            'tgl_sewa' => $request->input('tgl_sewa'),
            // 'status' => $request->input('status'),
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil Di input',
            'data' => $order
        ]);
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
