@extends('layouts.app')

@section('title', 'Réseau Social Laravel - Modification d\'un post')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @if (session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <div class="flex justify-center">
            <form class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')
                <h2 class="text-center text-2xl font-bold text-blue-800 mb-6">Modifier un post</h2>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Contenu</label>
                    <textarea required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" value="{{ $post->image }}" id="image">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">Tags</label>
                    <input required type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tags" value="{{ $post->tags }}" id="tags">
                </div>

                <div class="flex justify-between mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Valider</button>
                </div>
            </form>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Supprimer le post</button>
            </form>
        </div>
    </div>
@endsection
