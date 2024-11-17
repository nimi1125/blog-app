<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
use App\Models\Comment; 
use App\Http\Requests\PostRequest; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $post;
    public function __construct(
        Post $post,
    )
    {
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $posts = $this->post->getPosts();
        return view('home', compact('posts'));
    }

    public function mypage()
    {
        if (Auth::check()) {
            $posts = $this->post->getPosts(Auth::id());
            return view('mypage', compact('posts'));
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->orderBy('created_at', 'desc');
        return view('blog.write', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $imagePath = $request->file('image_path')->store('images', 'public');
        $imageUrl = Storage::url($imagePath);
        
        $post = new post;
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->image_path = $imageUrl;
        $post->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $post = Post::find($id);

    if (is_null($post)) {
        return view('blog.detail', ['error' => 'データがありません']);
    } 

    $posts = Post::where('user_id', $post->user_id)  
                ->where('id', '<>', $id)            
                ->orderBy('created_at', 'desc')     
                ->take(3)                            
                ->get();

    $comments = Comment::where('post_id', $id)
                ->orderBy('created_at', 'desc')
                ->with('user') 
                ->get();

    return view('blog.detail', compact('post', 'posts', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
