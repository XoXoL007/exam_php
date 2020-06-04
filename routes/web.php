<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::redirect('/', '/films');

Route::middleware('auth')
    ->group(function (){
        Route::resource('films', 'FilmController');
        Route::get('/films/{film}/toggle', 'FilmController@toggle')
            ->name('films.toggle');

        Route::resource('actors', 'ActorController');
        Route::get('/actors/{actor}/toggle', 'ActorController@toggle')
            ->name('actors.toggle');

        Route::resource('genres', 'GenreController');
        Route::get('/genres/{genre}/toggle', 'GenreController@toggle')
            ->name('genres.toggle');
    });

