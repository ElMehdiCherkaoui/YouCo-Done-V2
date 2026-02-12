<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;
use Illuminate\Support\Str;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = auth()->id();
        $search = Str::lower(trim($request->search));

        $query = Restaurant::with('user')
            ->where('isActive', true)
            ->withCount([
                'favoritedByUsers as is_favorite' => function ($q) use ($userId) {
                    $q->where('user_id', $userId);
                }
            ]);

        if ($search) {
            $words = explode(' ', $search);

            foreach ($words as $word) {
                $query->where(function ($q) use ($word) {
                    $q->where('city', 'LIKE', "%$word%")
                        ->orWhere('cuisine_type', 'LIKE', "%$word%")
                        ->orWhere('name', 'LIKE', "%$word%");
                });
            }
        }

        $restaurants = $query
            ->orderByDesc('is_favorite')
            ->paginate(10)
            ->withQueryString();

        return view('client.restaurantLists', [
            'restaurants' => $restaurants,
            'totalRestaurants' => Restaurant::where('isActive', true)->count(),
        ]);
    }



    public function show(string $id)
    {
        $userId = auth()->id();

        $restaurant = Restaurant::with(['user', 'menus.menuItems', 'favoritedByUsers' => fn($q) => $q->where('user_id', $userId),])
            ->withCount(['favoritedByUsers as is_favorite' => fn($q) => $q->where('user_id', $userId)])
            ->findOrFail($id);

        return view('client.restaurantDetails', compact('restaurant'));
    }
}