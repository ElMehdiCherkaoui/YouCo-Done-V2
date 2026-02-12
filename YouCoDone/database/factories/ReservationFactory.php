<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'reservation_date' => $this->faker->date(),
            'time_solt' => $this->faker->time('H:i'),
            'number_of_people' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'restaurant_id' => Restaurant::factory(),
            'user_id' => User::factory(),
        ];
    }
}