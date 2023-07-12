<?php

namespace App\Http\Controllers\API;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clientEmail' => 'required',
            'userEmail' => 'required',
            'cart' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        };

        $newLead = Lead::create([
            'clientEmail' => $request->clientEmail,
            'userEmail' => $request->userEmail,
            'cart' => $request->cart,
        ]);

        Mail::to($request->clientEmail)->send(new NewMail($newLead, $request->cart));
        
        Mail::to($request->userEmail)->send(new NewMail($newLead, $request->cart));
    }
}
