<?php

namespace Database\Seeders;

use App\Models\DataKost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataKostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DataKost::create([
            'user_id' => 2,
            'nama_kost' => 'kos anjayy',
            'alamat' => 'mastrip',
            'deskripsi' => 'enek wifi',
            'foto' => '1.jpg',
            'maps' => 'noe',
            'status' => 1,
            'longitude' => 323113,
            'latitude' => 323113,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}
