<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PokedexController;

Route::resource('pokemon', PokemonController::class);
Route::get('/', [PokedexController::class, 'index']);
