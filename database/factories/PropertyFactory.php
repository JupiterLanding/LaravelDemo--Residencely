<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'address' => $this->faker->address,
            'description' => $this->faker->paragraphs(5, true),
            'sqft' => $this->faker->numberBetween(900, 10000),
            'price' => $this->faker->randomFloat(3, 100, 500),
        ];
    }
}
