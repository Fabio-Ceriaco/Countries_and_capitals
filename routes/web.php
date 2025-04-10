<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

// Start Game
Route::get('/', [MainController::class, 'startGame'])->name('startGame');
Route::post('/prepareGame', [MainController::class, 'prepareGame'])->name('prepare_game');

//  In Game
Route::get('/game', [MainController::class, 'game'])->name('game');
