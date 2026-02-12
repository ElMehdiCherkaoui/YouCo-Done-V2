<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\MenuItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;




class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use AuthorizesRequests;
    public function index()
    {
        $userId = auth()->id();
        $restaurants = Restaurant::with('user')->where('user_id', $userId)->paginate(10)
            ->withQueryString();

        $totalRestaurants = Restaurant::count();
        $activeRestaurants = Restaurant::where('isActive', true)->count();

        return view('restaurateur.restaurants', compact(
            'restaurants',
            'totalRestaurants',
            'activeRestaurants',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('restaurateur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'required|url|max:2048',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cuisine_type' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'opening_hours' => 'required|string|max:255',
            'isActive' => 'required|boolean',
        ]);

        $validated['image'] = $request->input('image');

        $validated['user_id'] = auth()->id();

        Restaurant::create($validated);

        return redirect()->route('restaurateur.restaurants');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $restaurant = Restaurant::with([
            'user',
            'menus.menuItems'
        ])->findOrFail($id);


        $allItems = MenuItem::all();

        return view('restaurateur.show', compact('restaurant', 'allItems'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $this->authorize('update', $restaurant);

        return view('restaurateur.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $restaurant = Restaurant::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'required|url|max:2048',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cuisine_type' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'opening_hours' => 'required|string|max:255',
            'isActive' => 'required|boolean',
        ]);

        $validated['image'] = $request->input('image');


        $restaurant->update($validated);

        return redirect()->route('restaurateur.restaurants')->with('success', 'Restaurant updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->back();
    }
}