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

    public function pay(PayRequest $request)
    {
        $data = $request->all();

        $order = Transaction::create($data);
        return redirect()->route('home');


        // //SAMPLE REQUEST START HERE

        // // Set your Merchant Server Key
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // \Midtrans\Config::$isProduction = false;
        // // Set sanitization on (default)
        // \Midtrans\Config::$isSanitized = true;
        // // Set 3DS transaction for credit card to true
        // \Midtrans\Config::$is3ds = true;

        // $params = array(
        //     'transaction_details' => array(
        //         'order_id' => rand(),
        //         'gross_amount' => 10000,
        //     ),
        //     'customer_details' => array(
        //         'first_name' => 'budi',
        //         'last_name' => 'pratama',
        //         'email' => 'budi.pra@example.com',
        //         'phone' => '08111222333',
        //     ),
        // );

        // $snapToken = \Midtrans\Snap::getSnapToken($params);
    }
}
