<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    // Attributs assignables en masse
    protected $fillable = [
        'content',
        'tags',
        'image',
        'user_id',
        'post_id',
    ];

    // Relation avec le modèle Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
