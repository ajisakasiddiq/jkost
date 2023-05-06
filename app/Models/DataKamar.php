<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKamar extends Model
{
    use HasFactory;


    protected $table  = 'data_kamar';


    protected $fillable = [
        'kost_id',
        'jenis_kamar',
        'no_kamar',
        'harga',
        'status',
        'img_pertama',
        'img_kedua',
        'img_ketiga',
        'img_keempat',
        'deskripsi',
        'slug',
    ];
}
