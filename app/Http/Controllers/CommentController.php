<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest; 
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(CommentRequest $request,$id)
    {
        $post = Post::find($id);
    
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $id; 
        $comment->content = $request->content;
        $comment->save();
    
        return redirect()->route('comment.store', ['id' => $post->id])->with('success', 'コメントを投稿しました！');
    }
}
