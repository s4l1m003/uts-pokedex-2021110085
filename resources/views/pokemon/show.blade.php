@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ $pokemon->photo ? asset('storage/' . $pokemon->photo) : 'https://placehold.co/300' }}"
                     class="card-img-top" alt="{{ $pokemon->name }}">
                <div class="card-body">
                    <h5 class="card-title">#{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} {{ $pokemon->name }}</h5>
                    <p class="card-text"><strong>Species:</strong> {{ $pokemon->species }}</p>
                    <p><strong>Primary Type:</strong> {{ $pokemon->primary_type }}</p>
                    <p><strong>HP:</strong> {{ $pokemon->hp }}</p>
                    <p><strong>Attack:</strong> {{ $pokemon->attack }}</p>
                    <p><strong>Defense:</strong> {{ $pokemon->defense }}</p>
                    <p><strong>Weight:</strong> {{ $pokemon->weight }} kg</p>
                    <p><strong>Height:</strong> {{ $pokemon->height }} m</p>
                    <p><strong>Legendary Status:</strong> {{ $pokemon->is_legendary ? 'Yes' : 'No' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
