<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Auth;
use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = config('plates');
        foreach ($plates as $plate) {
            $newPlate = new Plate();
            $newPlate->name = $plate['name'];
            $newPlate->slug = Str::slug($plate['name']);
            $newPlate->description = $plate['description'];
            $newPlate->image_url = $plate['image_url'];
            $newPlate->price = $plate['price'];
            $newPlate->is_available = $plate['is_available'];
            $newPlate->restaurant_id = Auth::id();
            $newPlate->save();
        }
    }
}
