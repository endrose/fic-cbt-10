<?php

namespace Database\Seeders;

use App\Models\Soal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Soal::factory(100)->create();



        // Soal::create([
        //     'pertanyaan' => '1 + 1',
        //     'jawaban_a' => '2',
        //     'jawaban_b' => '3',
        //     'jawaban_c' => '4',
        //     'jawaban_d' => '1000',
        //     'user_id' => 1

        // ]);

        // Soal::create([
        //     'pertanyaan' => 'Ada awan langsung hujan',
        //     'jawaban_a' => 'Ya',
        //     'jawaban_b' => 'Tidak',
        //     'jawaban_c' => 'Bisa Ya',
        //     'jawaban_d' => 'Bida TIdak',
        //     'user_id' => 3

        // ]);
    }
}
