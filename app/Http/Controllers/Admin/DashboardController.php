<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $pemilik = User::where('role', 'pemilik')->count();
        $pencari = User::where('role', 'pencari')->count();
        return view(
            'pages.admin.admin-dashboard',
            [
                'pemilik' => $pemilik,
                'pencari' => $pencari,
            ]
        );
    }
}
