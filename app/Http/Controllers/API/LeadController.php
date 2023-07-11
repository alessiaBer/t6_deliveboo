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
            'fullname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'total_price' => 'required',
            'plates' => 'required',
            'status' => 'required',
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
            'fullname' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'total_price' => $request->total_price,
            'plates' => $request->plates,
            'status' => $request->status,
        ]);

        Mail::to($request->clientEmail)->send(new NewMail($newLead));
        
        Mail::to($request->userEmail)->send(new NewMail($newLead));
    }
}
