<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PlatController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('menus', MenuController::class);
Route::resource('reservations', ReservationController::class);
Route::get('/notre-carte', [PlatController::class, 'index'])->name('carte');