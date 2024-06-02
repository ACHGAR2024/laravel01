@extends('layouts.app')

@section('content')
    <div class="  text-white font-bold  container mx-auto px-10 bg-gray-900 ">
        <div class="w-full flex justify-center mt-6">
            <!-- /////////////////////////////// RECHERCHE /////////////////////////////// -->
            <form action="{{ route('rechercher') }}" method="get" class="ml-2">
                <div class="flex justify-center">
                    <div class="w-1/2 flex items-center justify-end mr-0">
                        <input class="text-black border-2 border-gray-200 ml-2 rounded-md pl-2" type="text" name="search" placeholder="Rechercher...">
                    </div>
                    <div class="flex items-center justify-end mr-0">
                        <button class="hover:scale-105 hover:bg-slate-300 hover:rounded-lg text-white rounded" type="submit">
                            <img src="/images/rechercher-des-donnees.png" alt="icone" class="">
                        </button>
                    </div>
                    
                </div>
            </form>
            
            <!-- ///////////////////////////////  END RECHERCHE /////////////////////////////// -->
            
        </div>
     <div class="w-full flex text-sm text-gray-600"> 
        <div class="w-1/2 flex text-xs">  
        <h2 class="text-2xl text-white mt-4 font-bold">Liste des Posts</h2>
        </div>
        <div class="w-1/2 flex items-center justify-end ml-0">
            <div class="flex items-center justify-end ml-0">
                <a class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('posts.create') }}">Ajouter un post</a>
            </div>
        </div>
    </div>
        @foreach ($posts as $post)
            <article class="bg-white rounded-lg overflow-hidden shadow-lg mt-6 text-xs">
                <a class="block transition duration-500 ease-in-out hover:scale-105" href="#">
                    <div class="overflow-hidden">
                        <img class="w-full h-64 object-cover transition duration-500 ease-in-out hover:opacity-75" src="https://source.unsplash.com/random/1600x900?{{ $loop->iteration }}" alt="Image {{ $loop->iteration }}" />
                    </div></a>
                <div class="p-4 text-xs">
                    <div class="w-full flex text-sm text-gray-600">
                        <div class="w-1/2 flex text-xs">
                           
                                <i class="fas fa-calendar-alt mr-2 text-sx"></i>
                                <a href="#" target="_blank">
                                    <img src="/images/poste-dinvite.png" alt="icone" class="w-5 h-5">
                                </a>
                                <span class="ml-2">Posté le {{ $post->created_at->format('j/m/Y') }}</span>
                            
                        </div>
                        @if (Auth::user()->id == $post->user_id)
                        <div class="w-1/2 flex items-center justify-end mr-0">
                            <a href="{{ route('posts.edit', $post) }}" target="_blank">
                                <img src="/images/poste-modif.png" alt="icone" class="w-7 h-7">
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="border-b border-gray-300 my-2"></div>
                    <div class="text-gray-700 text-sx">{{ $post->content }}</div>
                    <div class="flex items-center  mt-2">
                        <div class="inline-block  text-orange-800 rounded-full px-3 py-1 text-sm font-semibold mr-0">
                            <img src="/images/tag-seo.png" alt="tag" class="w-5 h-5"/> 
                        </div>
                        <div class="inline-block bg-blue-100 text-orange-800 rounded-full px-3 py-1 text-sm font-bold">{{ $post->tags }}</div>
                    </div>
                    <div class="mt-4 mb-2">
                          <div class="flex justify-center">
                            <a class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('comments.create') }}?post_id={{ $post->id }}">Ajouter un commentaire</a>
                        </div>
                    </div>
                    @foreach ($post->comments as $comment)
    <div class="bg-gray-100 p-4 rounded-lg shadow-inner mt-4 w-full">
        <div class="w-full flex text-sm text-gray-600">
            <div class="w-1/2 flex text-xs">
                <img src="/images/commentaires-des-utilisateurs.png" alt="icone" class="w-5 h-5">
                <i class="fas fa-calendar-alt mr-2"></i> Posté le {{ $comment->created_at->format('j/m/Y') }} par {{ $comment->user->pseudo }}
            </div>
            @if (Auth::user()->id == $comment->user_id)
                <div class="w-1/2 flex items-center justify-end mr-0">
                    <a href="{{ route('comments.edit', $comment->id) }}">
                        <img src="/images/poste-modif.png" alt="icone" class="w-7 h-7">
                    </a>
                </div>
            @endif
        </div>
        <div class="text-gray-700 mt-2">{{ $comment->content }}</div>
    </div>
@endforeach


                </div>
                @if (Auth::user()->id == $post->user_id)
                    <div class="flex justify-end p-4">
                        <a class="text-gray-600 hover:text-gray-900" href="{{ route('posts.edit', $post) }}"><i class="far fa-edit"></i></a>
                    </div>
                @endif
            </article>
        @endforeach
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
