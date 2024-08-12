<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;

Auth::routes();

Route::get('/', [ServerController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
