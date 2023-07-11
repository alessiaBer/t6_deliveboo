<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['clientEmail', 'userEmail', 'fullname', 'address', 'phone', 'total_price', 'plates', 'status'];
    
}
