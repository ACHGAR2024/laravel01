<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class RechercherController extends Controller
{
    public function rechercher(Request $request)
    {
        $query = $request->input('search');

        // Rechercher uniquement dans le contenu des posts
        $posts = Post::where('content', 'LIKE', "%$query%")->get();

        return view('rechercher.rechercher', compact('posts'));
    }
}
