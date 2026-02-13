<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
USE App\Models\Availability;
use App\Models\Restaurant;

class AvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Restaurant $restaurant)
{
    return view('restaurateur.availabilities', compact('restaurant'));
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
    public function store(Request $request, Restaurant $restaurant)
    {

        $validated = $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'is_available' => 'required|boolean',
        ]);
        $validated['restaurants_id'] = $restaurant->id;
        $validated['restaurants_id'] = $restaurant->id;

        Availability::create($validated);

        return back()->with('success', 'Schedule added successfully.');
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