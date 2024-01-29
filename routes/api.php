<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get api
Route::get('/{id?}',[ApiController::class,'alltodos']);

// store api

Route::post('/store',[ApiController::class, 'storetask'])->middleware('auth:sanctum');

 /**
  * *LOGIN API

  */

 Route::post('/login',[ApiController::class,'login']);

/**
 * *REGISTER API
 */
 
 Route::post('/registar',[ApiController::class,"register"]);
