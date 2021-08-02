<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);