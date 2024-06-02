<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RechercherController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// pour le profile
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// pour le home et les posts et les commentaires
Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('users', UserController::class)->except('index', 'create', 'store');


    Route::resource('posts', PostController::class);
    Route::get('/', [PostController::class, 'edit'])->name('posts.show');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    //Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    // Route pour la recherche
    Route::get('/rechercher', [RechercherController::class, 'rechercher'])->name('rechercher');

    Route::resource('comments', CommentController::class);


});





// pour l'auth
require __DIR__ . '/auth.php';


