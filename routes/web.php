<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
*/

// Route homepage principale
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Route per la creazione di articoli (richiede autenticazione)
Route::get('/create/article', [ArticleController::class, 'create'])
   ->name('create.article')
   ->middleware('auth');

// Route per visualizzare l'indice di tutti gli articoli
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');

// Route per visualizzare il dettaglio di un singolo articolo
Route::get('/show/article/{article}', [ArticleController::class, 'show'])->name('article.show');

// Route per visualizzare articoli filtrati per categoria
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');

// Route per accettare un articolo (revisore)
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');

// Route per rifiutare un articolo (revisore)
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');

// Route per l'indice del pannello revisore (richiede middleware isRevisor)
Route::get('/revisor/index', [RevisorController::class, 'index'])
   ->middleware('isRevisor')
   ->name('revisor.index');

// Route per richiedere di diventare revisore (richiede autenticazione)
Route::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])
   ->middleware('auth')
   ->name('become.revisor');

// Route per nominare un utente come revisore
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// Route per la ricerca di articoli
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('article.search');

// Route per cambiare la lingua dell'applicazione
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');