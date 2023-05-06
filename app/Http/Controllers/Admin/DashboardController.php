<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataKost;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $pemilik = User::where('role', 'pemilik')->count();
        $pencari = User::where('role', 'pencari')->count();
        // $kos = DataKost::where('status', 'valid')->count();
        return view(
            'pages.admin.admin-dashboard',
            [
                'pemilik' => $pemilik,
                'pencari' => $pencari,
                // 'datakos' => $kos,
            ]
        );
    }
}
