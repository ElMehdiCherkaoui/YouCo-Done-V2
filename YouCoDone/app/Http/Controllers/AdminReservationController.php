<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'restaurant', 'payment'])
            ->latest()
            ->paginate(10);

        $totalReservations = Reservation::count();
        $confirmed = Reservation::where('status', 'confirmed')->count();
        $pending = Reservation::where('status', 'pending')->count();
        $canceled = Reservation::where('status', 'cancelled')->count();

        return view('admin.admin-reservations', compact(
            'reservations',
            'totalReservations',
            'confirmed',
            'pending',
            'canceled'
        ));
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
        //
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