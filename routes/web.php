<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DamageReportController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('items', ItemController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('damage-reports', DamageReportController::class);

Route::get('items', [ItemController::class, 'index'])->name('items.index');
Route::get('items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('items', [ItemController::class, 'store'])->name('items.store');


Route::resource('reservations', ReservationController::class);


Route::get('reservations/{reservation_id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('reservations/{reservation_id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('reservations/{reservation_id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
