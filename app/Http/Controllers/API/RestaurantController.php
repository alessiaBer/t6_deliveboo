<?php

namespace App\Http\Controllers\API;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['types', 'plates', 'user'])->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::with(['types', 'plates', 'user'])
            ->where('slug', $slug)
            ->first();
        if ($restaurant) {
            return response()->json([
                'success' => true,
                'result' => $restaurant,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => '404 Restaurant not found',
            ]);
        }
    }
}
