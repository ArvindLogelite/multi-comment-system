<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', [PostController::class, 'index']);
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
