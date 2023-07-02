<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plate;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() == 1) {
            $plates = Plate::orderBy('name')->get();
        } else {
            $restaurant = Auth::user()->restaurant;
            $plates = $restaurant->plates;
        }

        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlateRequest $request)
    {
        $val_data = $request->validated();
        $slug = Plate::generateSlug($val_data['name']);
        $val_data['slug'] = $slug;
        $restaurant_id = Plate::generateRestaurantId();

        $val_data['restaurant_id'] = $restaurant_id;


        $new_plate = Plate::create($val_data);



        return to_route('admin.plates.index')->with('message', 'plate created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {

        //dd($plate);
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {

        return view('admin.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlateRequest  $request
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlateRequest $request, Plate $plate)
    {
        //dd($request);
        $val_data = $request->validated();
        $plate->update($val_data);

        return to_route('admin.plates.index')->with('message', 'plate updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();
        return to_route("admin.plates.index")->with("message", "Plate deleted");
    }
}
