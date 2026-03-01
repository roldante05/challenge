<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieDetailController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeriesDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/peliculas', MoviesController::class)->name('movies.index');
Route::get('/pelicula/{id}', MovieDetailController::class)->name('movies.show');
Route::get('/series', SeriesController::class)->name('series.index');
Route::get('/serie/{id}', SeriesDetailController::class)->name('series.show');
Route::get('/canales', ChannelsController::class)->name('channels.index');
