<?php

namespace Database\Factories;

use App\Models\Availability;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityFactory extends Factory
{
    protected $model = Availability::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
            'is_available' => $this->faker->boolean(),
            'restaurants_id' => Restaurant::factory(),
        ];
    }
}