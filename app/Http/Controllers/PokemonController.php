<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    public function create()
    {
        $types = ['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'];
        return view('pokemon.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'numeric|between:0,999999.99',
            'height' => 'numeric|between:0,999999.99',
            'hp' => 'integer|between:0,9999',
            'attack' => 'integer|between:0,9999',
            'defense' => 'integer|between:0,9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $pokemon = Pokemon::create($validated);
        if ($request->hasFile('photo')) {
            $pokemon->photo = $request->file('photo')->store('pokemons', 'public');
            $pokemon->save();
        }

        return redirect()->route('pokemon.index')->with('success', 'Pokemon created successfully.');
    }

    public function edit(Pokemon $pokemon)
    {
        $types = ['Grass', 'Fire', 'Water', 'Bug', 'Normal', 'Poison', 'Electric', 'Ground', 'Fairy', 'Fighting', 'Psychic', 'Rock', 'Ghost', 'Ice', 'Dragon', 'Dark', 'Steel', 'Flying'];
        return view('pokemon.edit', compact('pokemon', 'types'));
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'numeric|between:0,999999.99',
            'height' => 'numeric|between:0,999999.99',
            'hp' => 'integer|between:0,9999',
            'attack' => 'integer|between:0,9999',
            'defense' => 'integer|between:0,9999',
            'is_legendary' => 'boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $pokemon->update($validated);
        if ($request->hasFile('photo')) {
            $pokemon->photo = $request->file('photo')->store('pokemons', 'public');
            $pokemon->save();
        }

        return redirect()->route('pokemon.index')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'Pokemon deleted successfully.');
    }
}
