<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rt>
 */
class RtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => 'RT 00' . $this->faker->unique()->numberBetween(1, 25),
            'nama_krt' => $this->faker->name('male'),
            'nik_krt' => $this->faker->nik(),
            'kontak' => $this->faker->phoneNumber()
        ];
    }
}