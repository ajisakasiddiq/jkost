<?php

namespace App\Http\Controllers\Pencari;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('transactions')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('data_kamar', 'data_kamar.id', '=', 'transactions.kamar_id')
            ->join('data_kost', 'data_kost.id', '=', 'data_kamar.kost_id')
            ->select(
                'data_kost.nama_kost',
                'data_kost.id as id_kost',
                'data_kamar.id as id_kamar',
                'transactions.id as id_transaction',
                'transactions.user_id',
                'transactions.kamar_id',
                'users.id',
                'users.name',
                'data_kamar.no_kamar',
                'transactions.durasi_sewa',
                'transactions.nama_pemesan',
                'transactions.total_price',
                'transactions.tgl_sewa',
                'transactions.status',
            )

            ->first();
        // ->get();


        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $data->id_transaction,
                'gross_amount' => $data->total_price,
            ),
            'customer_details' => array(
                'nama_kost' => $data->nama_kost,
                'nama_pemesan' => $data->nama_pemesan,
                'durasi_sewa' => $data->durasi_sewa,
                'tgl_sewa' => $data->tgl_sewa,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view(
            'pages.pencari.pencari-transaksi',
            [
                'data' => $data,
                'no' => $no = 1,
                // 'snaptoken' => $snapToken,
            ]
        );
    }


    public function riwayat()
    {
        $data = DB::table('transactions')
            ->join('users', 'users.id', '=', 'transactions.user_id')
            ->join('data_kamar', 'data_kamar.id', '=', 'transactions.kamar_id')
            ->join('data_kost', 'data_kost.id', '=', 'data_kamar.kost_id')
            ->select(
                'data_kost.nama_kost',
                'data_kost.id as id_kost',
                'data_kamar.id as id_kamar',
                'transactions.id as id_transaction',
                'transactions.user_id',
                'transactions.kamar_id',
                'users.id',
                'users.name',
                'data_kamar.no_kamar',
                'transactions.durasi_sewa',
                'transactions.nama_pemesan',
                'transactions.total_price',
                'transactions.tgl_sewa',
                'transactions.status',
            )
            ->where('transactions.status', 'paid')
            ->get();

        return view(
            'pages.pencari.pencari-riwayat-transaksi',
            [
                'data' => $data,
                'no' => $no = 1
            ]
        );
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
