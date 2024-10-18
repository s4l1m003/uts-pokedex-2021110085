@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($pokemons as $pokemon)
        <div class="col">
            <div class="card h-100">
                <a href="{{ route('pokemon.show', $pokemon->id) }}">
                    <img src="{{ $pokemon->photo ? asset('storage/' . $pokemon->photo) : 'https://placehold.co/200' }}"
                         class="card-img-top" alt="{{ $pokemon->name }}">
                </a>
                <div class="card-body text-center">
                    <h5 class="card-title">
                        <a href="{{ route('pokemon.show', $pokemon->id) }}">
                            #{{ str_pad($pokemon->id, 4, '0', STR_PAD_LEFT) }} {{ $pokemon->name }}
                        </a>
                    </h5>
                    <span class="badge bg-primary rounded-pill">{{ $pokemon->primary_type }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $pokemons->links() }}
    </div>
</div>
@endsection
