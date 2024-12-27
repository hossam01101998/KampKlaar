<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DamageReportController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;



Route::get('/', function () {
    return view('privacy-policy');
});


Auth::routes();


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/make-admin/{user_id}', [AdminController::class, 'makeAdmin'])->name('admin.make');
});


//Route::get('/users', [UserController::class, 'index']);
//Route::get('/users/{user_id}', [UserController::class, 'show']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//Route::resource('users', UserController::class);
Route::resource('items', ItemController::class)->middleware('auth');
Route::resource('reservations', ReservationController::class)->middleware('auth');
Route::resource('damage-reports', DamageReportController::class)->middleware('auth');

Route::get('items', [ItemController::class, 'index'])->name('items.index')->middleware('auth');
Route::get('items/create', [ItemController::class, 'create'])->name('items.create')->middleware('auth');
Route::post('items', [ItemController::class, 'store'])->name('items.store')->middleware('auth');


Route::resource('reservations', ReservationController::class)->middleware('auth');


Route::get('reservations/{reservation_id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit')->middleware('auth');
Route::put('reservations/{reservation_id}', [ReservationController::class, 'update'])->name('reservations.update')->middleware('auth');
Route::delete('reservations/{reservation_id}', [ReservationController::class, 'destroy'])->name('reservations.destroy')->middleware('auth');


Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');


Route::get('/profile', [UserProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/edit', [UserProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update')->middleware('auth');



Route::post('/make-admin/{user_id}', [AdminController::class, 'makeAdmin'])->name('admin.make')->middleware('auth');
Route::post('/admin/remove/{user_id}', [AdminController::class, 'removeAdmin'])->name('admin.remove')->middleware('auth');
Route::delete('/admin/delete/{user_id}', [AdminController::class, 'deleteUser'])->name('admin.delete')->middleware('auth');



Route::resource('damage_reports', DamageReportController::class)->middleware('auth');

