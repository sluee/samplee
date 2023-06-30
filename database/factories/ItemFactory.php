<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => fake()->words(3, true),
            'description'   =>fake()->words(10, true),
            'qty'           =>fake()->numberBetween(10,100),
            'price'         =>fake()->numberBetween(100, 1000)
        ];
    }
}
