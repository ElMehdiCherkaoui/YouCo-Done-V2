<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Availability;
use Carbon\Carbon;
use App\Models\Reservation;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Restaurant $restaurant)
    {
        $availabilities = \App\Models\Availability::where('restaurants_id', $restaurant->id)->get();
        $timeSlots = [];
        foreach ($availabilities as $availability) {
            $start = Carbon::parse($availability->start_time);
            $end   = Carbon::parse($availability->end_time);
            while ($start < $end) {
                $timeSlots[] = $start->format('H:i');
                $start->addMinutes(30);
            }
        }
        $timeSlots = collect($timeSlots)->toArray();
        return view('client.reserve', compact('restaurant', 'timeSlots'));
    }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reservation_date' => 'required|date',
            'time_solt' => 'required|string|max:255',
            'number_of_people' => 'required|integer|min:1',
            'restaurant_id' => 'required',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';
        $reservation = Reservation::create($validated);

        return redirect()->route('client.payment', [
            'restaurant' => $reservation->restaurant_id,
            'reservation' => $reservation->id,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
