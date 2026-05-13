<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ReservationController;

require __DIR__.'/auth.php';

// Routes publiques - consultation uniquement
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{nom}', [MenuController::class, 'categorie'])->name('menu.categorie');

// Routes pour utilisateurs authentifiés
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestion des réservations par les utilisateurs (hors admin)
    Route::middleware(['not_admin'])->group(function () {
        Route::resource('reservations', ReservationController::class)->except(['index', 'show']);
        Route::get('/reservations/{reservation}/payment', [ReservationController::class, 'payment'])->name('reservations.payment');
        Route::post('/reservations/{reservation}/payment', [ReservationController::class, 'processPayment'])->name('reservations.payment.process');
        Route::get('/reservations/{reservation}/confirmation', [ReservationController::class, 'confirmation'])->name('reservations.confirmation');
    });
});

// Routes admin uniquement
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Gestion des réservations (admin)
    Route::get('/reservations', [AdminController::class, 'reservations'])->name('reservations');
    Route::patch('/reservations/{reservation}', [AdminController::class, 'updateReservation'])->name('reservation.update');
    Route::post('/reservations/withdraw', [AdminController::class, 'withdrawPayments'])->name('reservations.withdraw');

    // Gestion des plats (admin)
    Route::get('/plats', [AdminController::class, 'plats'])->name('plats');
    Route::get('/plats/{plat}/edit', [AdminController::class, 'editPlat'])->name('plat.edit');
    Route::post('/plats', [AdminController::class, 'storePlat'])->name('plat.store');
    Route::patch('/plats/{plat}', [AdminController::class, 'updatePlat'])->name('plat.update');
    Route::delete('/plats/{plat}', [AdminController::class, 'destroyPlat'])->name('plat.destroy');
});