<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nim = 2020012;
        return [
            'nim' => $nim . $this->faker->unique()->numberBetween(100, 999),
            'nama_mhs' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail,
            'umur' => rand(18, 23),
            'alamat' => $this->faker->address()            
        ];
    }
}
