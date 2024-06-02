@extends ('layouts/app')

@section('title')
Réseau Social Laravel - Mon compte
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-800 mb-4">Mon compte</h1>
    <h3 class="text-xl font-semibold pb-3">Modifier mes informations</h3>
    <div class="flex flex-col items-center">
        <form class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="pseudo">Nouveau pseudo</label>
                <input required type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="modifier" name="pseudo" value="{{ $user->pseudo }}" id="pseudo">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Nouvelle image</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="modifier" name="image" value="{{ $user->image }}" id="image">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Valider</button>
            </div>
        </form>
        
        <form class="w-full max-w-lg bg-white shadow-md rounded px-8 pt-6 pb-8" action="{{ route('users.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Supprimer le compte</button>
            </div>
        </form>
    </div>
</div>
@endsection
