<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

Route::view('/', 'home');


Route::get('/show_data', [MainController::class, 'showData']);
