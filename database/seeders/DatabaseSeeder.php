<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\SoalSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UjianSeeder;
use Database\Seeders\MateriSeeder;
use Database\Seeders\ContentSeeder;
use Database\Seeders\UjianSoalListSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            SoalSeeder::class,
            UjianSeeder::class,
            UjianSoalListSeeder::class,
            ContentSeeder::class,
            MateriSeeder::class,
        ]);
    }
}
