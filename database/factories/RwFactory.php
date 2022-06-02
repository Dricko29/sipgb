<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rw>
 */
class RwFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => 'RW 00'.$this->faker->unique()->numberBetween(1,6),
            'nama_krw' => $this->faker->name('male'),
            'nik_krw' => $this->faker->nik(),
            'kontak' => $this->faker->phoneNumber()
        ];;
    }
}