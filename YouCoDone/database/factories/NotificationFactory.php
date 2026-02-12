<?php

namespace Database\Factories;

use App\Models\Notification;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['email', 'sms', 'app']),
            'message' => $this->faker->sentence(),
            'reservation_id' => Reservation::factory(),
            'user_id' => User::factory(),
        ];
    }
}