@extends('layouts.app')

@section('title', 'Réseau Social Laravel - Recherche texte dans postes')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-white mb-4">Recherche</h1>
        <h3 class="text-xl font-semibold pb-3 text-gray-100">Résultats de recherche pour "{{ request('search') }}"</h3>
        @if($posts->isEmpty())
            <p class="text-green-300">Aucun résultat trouvé.</p>
        @else
            @foreach ($posts as $post)
                <div class="mb-4">
                    <a href="#" class="text-blue-800 hover:text-blue-600">
                        <h2 class="text-2xl font-bold mb-2 hover:text-orange-600 text-blue-400">Post #{{ $post->id }}</h2>
                    </a>
                    @php
                    $search = request('search');
                    $highlightedContent = preg_replace("/($search)/i", '<span class="font-bold text-orange-600">$1</span>', $post->content);
                @endphp
                <p class="text-gray-300">{!! $highlightedContent !!}</p>
            </div>
            @endforeach
        @endif
    </div>
@endsection
