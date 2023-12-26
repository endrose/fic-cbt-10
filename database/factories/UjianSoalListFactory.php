<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UjianSoalList>
 */
class UjianSoalListFactory extends Factory
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

            'ujian_id' => fake()->numberBetween(1, 10),
            'soal_id' => fake()->numberBetween(1, 10),
            'kebenaran' => fake()->boolean()
        ];
    }
}
