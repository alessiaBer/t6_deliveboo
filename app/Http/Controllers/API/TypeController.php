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

    public function show($slug)
    {
        $type = Type::with(['restaurants'])
            ->where('slug', $slug)
            ->first();
        if ($type) {
            return response()->json([
                'success' => true,
                'result' => $type,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => '404 type not found',
            ]);
        }
    }
}
