<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     // return view('welcome');
// });
// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
Route::get('/', \App\Livewire\Karyawan\Index::class)->name('index.karyawan');
Route::get('/data-karyawan', \App\Livewire\Karyawan\Data::class)->name('data.karyawan');

Route::get('/rfid', \App\Livewire\TestingRFID::class)->name('RFID');


// Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified', ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
