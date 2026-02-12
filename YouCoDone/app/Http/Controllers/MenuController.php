<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\MenuItem;
use \App\Models\Menu;
use \App\Models\Restaurant;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}


    /**
     * Show the form for creating a new resource.
     */
    public function create($restaurantId)
    {
        $menuItems = MenuItem::all();
        $restaurant = Restaurant::findOrFail($restaurantId);

        return view('restaurateur.menuCreate', compact('menuItems', 'restaurant'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $restaurantId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'menu_items' => 'required|array',
            'menu_items.*' => 'exists:menu_items,id',
        ]);

        $menu = Menu::create([
            'title' => $request->title,
            'description' => $request->description,
            'restaurant_id' => $restaurantId,
        ]);

        $menu->menuItems()->attach($request->menu_items);

        return redirect()
            ->route('restaurateur.restaurant.show', $restaurantId);
    }

    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()
            ->route('restaurateur.restaurant.show', $menu->restaurant_id);
    }
}
