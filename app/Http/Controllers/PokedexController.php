<?php

// app/Http/Controllers/PokedexController.php
namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::paginate(20);

        return view('pokedex', compact('pokemons'));
    }
}

