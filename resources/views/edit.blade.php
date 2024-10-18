<!-- resources/views/pokemon/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pokémon</h1>

        <!-- Show validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Pokémon Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pokemon->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="species" class="form-label">Species</label>
                <input type="text" class="form-control" id="species" name="species" value="{{ old('species', $pokemon->species) }}" required>
            </div>

            <div class="mb-3">
                <label for="primary_type" class="form-label">Primary Type</label>
                <select class="form-select" id="primary_type" name="primary_type" required>
                    <option value="">Choose Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" {{ old('primary_type', $pokemon->primary_type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Weight</label>
                <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="{{ old('weight', $pokemon->weight) }}">
            </div>

            <div class="mb-3">
                <label for="height" class="form-label">Height</label>
                <input type="number" step="0.01" class="form-control" id="height" name="height" value="{{ old('height', $pokemon->height) }}">
            </div>

            <div class="mb-3">
                <label for="hp" class="form-label">HP</label>
                <input type="number" class="form-control" id="hp" name="hp" value="{{ old('hp', $pokemon->hp) }}">
            </div>

            <div class="mb-3">
                <label for="attack" class="form-label">Attack</label>
                <input type="number" class="form-control" id="attack" name="attack" value="{{ old('attack', $pokemon->attack) }}">
            </div>

            <div class="mb-3">
                <label for="defense" class="form-label">Defense</label>
                <input type="number" class="form-control" id="defense" name="defense" value="{{ old('defense', $pokemon->defense) }}">
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="is_legendary" name="is_legendary" {{ old('is_legendary', $pokemon->is_legendary) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_legendary">Is Legendary</label>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                <img src="{{ asset('storage/' . $pokemon->photo) }}" alt="Pokemon Photo" class="img-thumbnail mt-3" style="max-height: 150px;">
            </div>

            <button type="submit" class="btn btn-primary">Update Pokémon</button>
        </form>
    </div>
@endsection
