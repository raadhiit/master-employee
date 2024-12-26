<?php

use App\Http\Controllers\RFIDController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// test api
Route::post('/store-rfid', [RFIDController::class, 'getRFID']);
// Route::get('/store-rfid', [RFIDController::class, 'getRFID']);