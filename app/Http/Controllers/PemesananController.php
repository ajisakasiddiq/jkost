<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\DataKost;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{


    public function index()
    {
        $user = User::all();
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
        return view(
            'pages.Pemesanan',
            [
                'data' => $data,
                'user' => $user
            ]
        );
        return response()->json([
            'data' => $data,
            'message' => 'Get Data berhasil',
        ]);
    }
    public function details()
    {
        $user = User::all();
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
        return view(
            'pages.details',
            [
                'data' => $data,
                'user' => $user
            ]
        );
    }
    public function checkout()
    {
        $data =  DB::table('data_kamar')
            ->select(
                'data_kost.status as status_kost',
                'data_kamar.status as status_kamar',
                'data_kost.nama_kost',
                'data_kost.id as id_kost',
                'data_kost.alamat',
                'data_kost.deskripsi as deskripsi_kost',
                'data_kost.nama_kost',
                'data_kost.slug',
                'data_kost.longitude',
                'data_kost.latitude',
                'data_kamar.jenis_kamar',
                'data_kamar.no_kamar',
                'data_kamar.harga',
                'data_kamar.id as id_kamar',
                'data_kamar.img_pertama',
                'data_kamar.img_kedua',
                'data_kamar.img_ketiga',
                'data_kamar.img_keempat',
                'data_kamar.deskripsi as deskripsi_kamar'
            )
            ->leftJoin('data_kost', 'data_kost.id', '=', 'data_kamar.kost_id')
            ->get();
        return view('pages.checkout', ['data' => $data]);
    }

    public function pembayaran()
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
            ->where('transactions.status', 'unpaid')
            // ->first();
            ->get();
        // ->find()


        // SAMPLE REQUEST START HERE

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = 'SB-Mid-server-LVNbQZaBDFbkgVJ51O4rcHIA';
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => $data->id_transaction,
        //         'gross_amount' => $data->total_price,
        //     ),
        //     'customer_details' => array(
        //         'nama_kost' => $data->nama_kost,
        //         'nama_pemesan' => $data->nama_pemesan,
        //         'durasi_sewa' => $data->durasi_sewa,
        //         'tgl_sewa' => $data->tgl_sewa,
        //     ),
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);

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

    public function pay(PayRequest $request)
    {
        $data = $request->all();

        $order = Transaction::create($data);
        return redirect()->route('Pembayaran-Kost', compact('data'));
    }
}
