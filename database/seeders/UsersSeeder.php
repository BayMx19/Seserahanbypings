<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_users')->insert([
        'name' => "Admin",
        'nohp' => "082191927762",
        'email' => "admin@seserahanbypings.site",
        'password' => Hash::make('Admin123'),
        'role' => "Admin",
        'foto_profil' => "",
        'jenis_kelamin' => "Perempuan",
        'status' => "ACTIVE",
        ]);
        DB::table('m_users')->insert([
        'name' => "Pembeli",
        'nohp' => "082191927762",
        'email' => "pembeli@seserahanbypings.site",
        'password' => Hash::make('Pembeli123'),
        'role' => "User",
        'foto_profil' => "",
        'jenis_kelamin' => "Laki-Laki",
        'status' => "ACTIVE",
        'alamat' => "Jl. Contoh Alamat No. 123",
        'provinsi' => "Jawa Barat",
        'kota' => "Bandung",
        'kecamatan' => "Coblong",
        'kelurahan' => "Ciumbuleuit",
        'RT' => "01",
        'RW' => "02",
        'kode_pos' => "40141",
        ]);
        
    }
}
