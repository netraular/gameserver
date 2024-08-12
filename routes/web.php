<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\GameController;

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [ServerController::class, 'index']);

Route::get('/admin/games', [GameController::class, 'index'])->name('admin.games.index');
Route::get('/admin/game/{id}', [GameController::class, 'show'])->name('admin.game.show');

Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/servers/create', [ServerController::class, 'create'])->name('servers.create');
Route::post('/servers', [ServerController::class, 'store'])->name('servers.store');
Route::get('/servers', [ServerController::class, 'index'])->name('servers.index');