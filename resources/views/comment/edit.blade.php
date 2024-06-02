@extends('layouts.app')

@section('title')
    Réseau Social Laravel - Modifier un commentaire
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-center">
            <form class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('comments.update', $comment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h2 class="text-2xl font-bold text-center text-blue-800 mb-4">Modifier un commentaire</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Contenu</label>
                    <textarea required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="content" cols="30" rows="10" placeholder="Contenu du commentaire">{{ $comment->content }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" value="{{ $comment->image }}" id="image">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">Tags</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tags" value="{{ $comment->tags }}" id="tags">
                </div>
                <div class="mb-4">
                    <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Modifier</button>
                </div>
            </form>
        </div>
        <div class="flex justify-center mt-4">
            <a class="text-blue-500 hover:text-blue-700" href="{{ url()->previous() }}">Revenir à la page précédente</a>
        </div>
    </div>
@endsection
