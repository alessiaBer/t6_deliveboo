<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'total_price' => ' required',
            'status' => 'required',
            'plates' => 'required' 
        ]); 

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        };

        $order = Order::create([
            'fullname' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        $plates = $request->plates;

        foreach ($plates as $plate) {
            
            $order->plates()->attach($plate);
        }
        

        return response()->json([
            'success' => true
        ]);
    }
}
