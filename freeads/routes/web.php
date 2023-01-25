<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/annonce', [App\Http\Controllers\AdController::class, 'create'])->name('ad.create');
});

/* Ads Routes */
Route::get('/annonces', [App\Http\Controllers\AdController::class, 'index'])->name('ad.index');
Route::post('/annonce/create', [App\Http\Controllers\AdController::class, 'store'])->name('ad.store');
Route::post('/search', [App\Http\Controllers\AdController::class, 'search'])->name('ad.search');

/* Update Ads Routes */
Route::get('/annonce/{id}', [App\Http\Controllers\AdController::class, 'show'])->name('ad.show');
Route::get('/annonce/{id}/edit', [App\Http\Controllers\AdController::class, 'edit'])->name('ad.edit');
Route::patch('/annonce/{id}/update', [App\Http\Controllers\AdController::class, 'update'])->name('ad.update');
Route::delete('/annonce/{id}/delete', [App\Http\Controllers\AdController::class, 'destroy'])->name('ad.destroy');


