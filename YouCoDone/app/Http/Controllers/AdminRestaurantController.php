<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class AdminRestaurantController extends Controller
{

    public function index()
    {
        $restaurants = Restaurant::with('user')->paginate(10)
            ->withQueryString();

        $totalRestaurants = Restaurant::count();
        $activeRestaurants = Restaurant::where('isActive', true)->count();

        return view('admin.restaurants', compact(
            'restaurants',
            'totalRestaurants',
            'activeRestaurants',
        ));
    }

    public function destroy(string $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('admin.restaurants');
    }
}
