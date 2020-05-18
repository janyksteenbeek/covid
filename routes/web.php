<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'getIndex'])->name('home');
Route::get('/country/{code}', [\App\Http\Controllers\CountryController::class, 'getIndex'])->name('country');
