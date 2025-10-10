<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Tetato Admin',
            'email' => 'tetato@admin.com',
            "password" => Hash::make('tetatoadmin123'),
        ]);

        Kategori::insert([
            ["nama_kategori" => "Kemasan 65 Gram"],
            ["nama_kategori" => "Kemasan 250 Gram"],
            ["nama_kategori" => "Paket Bundling"]
        ]);
    }
}
