<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('comment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        Comment::create([
            'content' => $request->content,
            'tags' => $request->tags,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
        ]);

        return redirect()->route('home')
            ->with('success', 'Commentaire créé avec succès!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::user()->id != $comment->user_id) {
            return redirect()->route('home')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé à modifier ce commentaire']);
        }

        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:255',
            'image' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $comment = Comment::findOrFail($id);

        if (Auth::user()->id != $comment->user_id) {
            return redirect()->route('home')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé à modifier ce commentaire']);
        }

        $comment->update($request->all());

        return redirect()->route('home')->with('message', 'Le commentaire a bien été modifié.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::user()->id != $comment->user_id) {
            return redirect()->route('home')->withErrors(['erreur' => 'Vous n\'êtes pas autorisé à supprimer ce commentaire']);
        }

        $comment->delete();

        return redirect()->route('home')->with('message', 'Le commentaire a bien été supprimé.');
    }
}
