<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dusun>
 */
class DusunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_kadus' => $this->faker->name('male'),
            'nik_kadus' => $this->faker->nik(),
            'kontak' => $this->faker->phoneNumber()
        ];
    }
}