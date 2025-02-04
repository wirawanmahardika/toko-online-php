<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->isAdmin()->create([
            'name' => 'wirawan',
            'koordinat' => '5.1432, 195.123',
            'alamat' => 'pondok indah, tamalanrea',
            'email' => 'wira@example.com',
            'password'  => Hash::make('wirawan123')
        ]);

        // Kategori::factory()->create();
    }
}
