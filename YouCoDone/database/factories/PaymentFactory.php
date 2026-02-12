<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 10, 300),
            'type' => $this->faker->randomElement(['card', 'cash', 'paypal']),
            'message' => $this->faker->sentence(),
            'reservation_id' => Reservation::factory(),
        ];
    }
}