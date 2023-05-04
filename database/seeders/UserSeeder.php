<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');

        $pemilik = User::create([
            'name' => 'pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $pemilik->assignRole('pemilik');

        $pencari = User::create([
            'name' => 'pencari',
            'email' => 'pencari@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $pencari->assignRole('pencari');
    }
}
