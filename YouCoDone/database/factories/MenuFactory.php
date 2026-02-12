<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word . ' Menu',
            'description' => $this->faker->sentence(10),
            'restaurant_id' => Restaurant::factory(),
        ];
    }
}