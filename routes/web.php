<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/create/article', [ArticleController::class, 'create'])->name('create.article')->middleware('auth');