<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

// Start Game
Route::get('/', [MainController::class, 'startGame'])->name('start_game');
Route::post('/prepareGame', [MainController::class, 'prepareGame'])->name('prepare_game');

//  In Game
Route::get('/game', [MainController::class, 'game'])->name('game');
Route::get('/answer/{answer}', [MainController::class, 'answer'])->name('answer');
Route::get('/next_question', [MainController::class, 'nextQuestion'])->name('next_question');

// game over
Route::get('/show_results', [MainController::class, 'showResult'])->name('show_results');
