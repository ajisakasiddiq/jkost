<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        return view('pages.pemesanan');
    }
    public function details()
    {
        return view('pages.details');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
}
