<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence(10),
            'number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'image' => $this->faker->imageUrl(640, 480, 'food'),
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'cuisine_type' => $this->faker->randomElement([
                'Italian',
                'Moroccan',
                'French',
                'Japanese',
                'Mexican'
            ]),
            'capacity' => $this->faker->numberBetween(20, 200),
            'opening_hours' => '09:00 - 23:00',
            'isActive' => $this->faker->boolean(70),
            'user_id' => User::factory(),
        ];
    }
}