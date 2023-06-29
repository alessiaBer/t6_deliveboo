<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurants');

        foreach($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->slug = Str::slug($restaurant['name']);
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->p_iva = $restaurant['p_iva'];
            $newRestaurant->phone = $restaurant['phone'];
            $newRestaurant->image_url = $restaurant['image_url'];
            $newRestaurant->save();
        }
    }
}
