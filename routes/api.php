<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('country/{code}', [\App\Http\Controllers\Api\CountryController::class, 'getCountry'])->name('country');
