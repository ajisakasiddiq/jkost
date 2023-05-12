<?php

namespace App\Http\Controllers;

use App\Models\DataKost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{


    public function index()
    {
        $data =  DB::table('data_kost')
            ->leftJoin('data_kamar', 'data_kost.id', '=', 'data_kamar.kost_id')
            ->get();
        return view('pages.Pemesanan', ['data' => $data]);
    }
    public function details()
    {

        return view('pages.details');
    }

    // public function checkout()
    // {
    //     return view('pages.checkout');

    //     $slug = [
    //         'slug' => "mami-kost",

    //     ];
    //     return view('pages.detail_kost' . $slug);
    // }
}
