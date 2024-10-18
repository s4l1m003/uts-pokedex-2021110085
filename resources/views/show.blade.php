<!-- resources/views/pokemon/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pokémon Details</h1>

        <div class="card">
            <div class="card-header">
                {{ $pokemon->name }} (ID: {{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }})
            </div>
            <div class="card-body">
                <h5 class="card-title">Species: {{ $pokemon->species }}</h5>
                <p class="card-text">Primary Type: {{ $pokemon->primary_type }}</p>
                <p class="card-text">Weight: {{ $pokemon->weight }} kg</p>
                <p class="card-text">Height: {{ $pokemon->height }} m</p>
                <p class="card-text">HP: {{ $pokemon->hp }}</p>
                <p class="card-text">Attack: {{ $pokemon->attack }}</p>
                <p class="card-text">Defense: {{ $pokemon->defense }}</p>
                <p class="card-text">Legendary: {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>

                <div class="mt-3">
                    @if($pokemon->photo)
                        <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="Pokemon Photo" class="img-thumbnail">
                    @endif
                </div>
            </div>
        </div>

        <a href="{{ route('pokemon.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
