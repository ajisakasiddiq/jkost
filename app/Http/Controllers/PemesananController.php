<?php

namespace App\Http\Controllers;

use App\Models\DataKost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{


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
        return view('pages.Pemesanan', ['data' => $data]);
    }
    public function details()
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
        return view('pages.details', ['data' => $data]);
    }
    public function checkout()
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
        return view('pages.checkout', ['data' => $data]);
    }
}
