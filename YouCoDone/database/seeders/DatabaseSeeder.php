<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Favorite;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\Availability;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory(10)->create();

        Restaurant::factory(5)->has(Menu::factory(2)->hasAttached(MenuItem::factory())) -> create();

        Favorite::factory(10)->create();

        Reservation::factory()->count(10)->create();
        Payment::factory()->count(10)->create();
        Notification::factory()->count(10)->create();
        Availability::factory()->count(10)->create();
    }
}