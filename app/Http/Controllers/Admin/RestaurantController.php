<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::id());
        //$restaurants = Restaurant::orderByDesc('id')->get();
        if (Auth::id() == 1) {
            $restaurants = Restaurant::orderBy('name')->get();
        } else {
            $restaurants = Auth::user(Auth::id())
                ->restaurant()
                ->orderByDesc('id')
                ->get();
        }
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO mettere if auth::user->restaurant errore
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $val_data = $request->validated();

        $val_data['slug'] = Restaurant::generateSlug($val_data['name']);
        
        $val_data['user_id'] = Auth::id();

        if ($request->hasFile('image_url')){
            $image_path = Storage::put('uploads', $request->image_url);
            $val_data['image_url'] = $image_path;
        };
        
        $newRestaurant = Restaurant::create($val_data);

        return to_route('admin.restaurants.index')->with('message', 'Restaurant created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        if (Auth::id() === $restaurant->user_id || Auth::id(1) === $restaurant->user_id ) {
            return view('admin.restaurants.edit', compact('restaurant'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $val_data = $request->validated();

        $val_data['name'] = $request->input('name');

        $val_data['slug'] = Restaurant::generateSlug($val_data['name']);

        if ($request->hasFile('image_url')){

            if($restaurant->image_url){
                Storage::delete($restaurant->image_url);
            };

            $image_path = Storage::put('uploads', $request->image_url);
            $val_data['image_url'] = $image_path;
        };

        $restaurant->update($val_data);

        return to_route('admin.restaurants.index')->with('message', 'Restaurant edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return to_route('admin.restaurants.index')->with('message', 'Restaurant deleted');
    }
}
