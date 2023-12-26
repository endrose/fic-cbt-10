<?php

namespace Database\Seeders;

use App\Models\UjianSoalList;
use Illuminate\Database\Seeder;

class UjianSoalListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UjianSoalList::factory()->count(200)->create();
    }
}
