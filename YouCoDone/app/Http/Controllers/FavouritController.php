<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;

class FavouritController extends Controller
{



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $restaurantId)
    {
        $userId = auth()->id();


        $exists = Favorite::where('user_id', $userId)
            ->where('restaurant_id', $restaurantId)
            ->exists();

        if (!$exists) {
            Favorite::create([
                'user_id' => $userId,
                'restaurant_id' => $restaurantId,
            ]);
        }

        return back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $restaurantId)
    {
        $userId = auth()->id();

        Favorite::where('user_id', $userId)
            ->where('restaurant_id', $restaurantId)
            ->delete();

        return back();
    }
}
