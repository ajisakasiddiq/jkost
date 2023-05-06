<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kamar_id',
        'kode_pemesanan',
        'nama_pemesan',
        'nik',
        'tgl_pemesanan',
        'durasi_sewa',
        'harga_kamar',
        'tgl_bayar',
        'total_pembayaran',
        'status_penyewaan',
    ];
}
