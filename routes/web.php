<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// The get route for the welcome page
Route::get('/', function () {
    return view('welcome');
});

// The get route for the rooms index page
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

// The post route for submitting a reservations
Route::post('/reserve', [ReservationController::class, 'store'])->name('reservations.create');
