<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image_url', 'price', 'is_available', 'restaurant_id'];

    public static function generateSlug($name){
        return Str::slug($name, "-");
    }

    public static function generateRestaurantId(){
        return Auth::user()->restaurant->id;
    }

    /**
     * Get the user that owns the Plate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

}
