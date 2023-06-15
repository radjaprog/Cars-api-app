<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => $this->faker->randomElement(['toyota', 'nissan', 'vw', 'opel', 'bmw']),
            'model' => $this->faker->text($maxNbChar = 20),
            'year' => $this->faker->numberBetween(1990, 2023),
            'is_automatic' => $this->faker->boolean(false),
            'engine' => $this->faker->randomElement(['diesel', 'petrol', 'hybrid', 'electric']),
            'number_of_doors' => $this->faker->numberBetween(2, 5),
            'max_speed' => $this->faker->numberBetween(200, 300),
        ];
    }
}
