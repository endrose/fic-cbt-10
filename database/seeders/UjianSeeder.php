<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Seeder;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ujian::factory()->count(20)->create();
    }
}
