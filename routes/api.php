<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('subscribe', [\App\Http\Controllers\Api\SubscribeController::class, 'postSubscribe'])->name('subscribe');
