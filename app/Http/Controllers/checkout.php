<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkout extends Controller
{
    public function product_detail($id)
    {
        return view('pages.checkout');
    }
}
