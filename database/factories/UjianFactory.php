<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ujian>
 */
class UjianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => fake()->numberBetween(1, 10),
            'nilai_angka' => fake()->numberBetween(1, 100),
            'nilai_verbal' => fake()->numberBetween(1, 100),
            'nilai_logika' => fake()->numberBetween(1, 100),
            'hasil' => fake()->randomElement(['Lulus', 'Tidak Lulus']),

        ];
    }
}
