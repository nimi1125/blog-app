<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $table = 'posts';
    protected $fillable = ['user_id','title', 'content']; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->hasOne(category::class);
    }

    public function getPosts($userId = null)
    {
        $posts = Post::select('posts.*', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->orderBy('posts.updated_at', 'desc');

        if ($userId) {
            $posts->where('posts.user_id', $userId);
        }

        return $posts->paginate(9);
    }
}
