<?php

use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\API\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\TypeController;
use App\Models\Lead;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/restaurants/{restaurant:slug}', [RestaurantController::class, 'show']);

Route::get('/types', [TypeController::class, 'index']);

Route::get('/types/{type:slug}', [TypeController::class, 'show']);

Route::post('/orders', [OrderController::class, 'store']);

Route::post('/leads', [LeadController::class, 'store']);

