<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soal>
 */
class SoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pertanyaan' =>  fake()->text(),
            'kategori' => fake()->randomElement(['Numeric', 'Verbal', 'Logika']),
            'jawaban_a' => fake()->word,
            'jawaban_b' => fake()->word,
            'jawaban_c' => fake()->word,
            'jawaban_d' => fake()->word,
            'kunci' => fake()->randomElement(['a', 'b', 'c', 'd'])

        ];
    }
}
