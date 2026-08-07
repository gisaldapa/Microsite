<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Generasi 10 data dummy ke tabel links
        Link::factory(10)->create();

        // Buat data user admin
        User::create([
            'name'     => 'Admin BioLink',
            'email'    => 'admin@biolink.com',
            'password' => Hash::make('password123'),
        ]);
    }
}