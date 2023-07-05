<?php

namespace App\Http\Controllers\API;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::with(['restaurants'])->orderBy('name')->get();
        return response()->json([
            'success' => true,
            'results' => $types,
        ]);
    }
}
