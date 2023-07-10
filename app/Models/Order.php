<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
//use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'address', 'phone', 'email', 'total_price', 'status'];

    public function plates(): BelongsToMany
    {
        return $this->belongsToMany(Plate::class);
    }
}
