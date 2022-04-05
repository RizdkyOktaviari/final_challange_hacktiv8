<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kategori_id' => $this->faker->numberBetween(1, 10),
            'nama' => $this->faker->name,
            'berat' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(),
            'harga' => $this->faker->numberBetween(1, 100),
            'status' => $this->faker->randomElement(['Draft', 'Aktif']),
        ];
    }
}