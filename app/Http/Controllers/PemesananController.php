<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pages.pemesanan');
    }
    public function order()
    {
        return view('pages.detail_kost');
    }
}
