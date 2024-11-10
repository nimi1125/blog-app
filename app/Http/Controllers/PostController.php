<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
use App\Http\Requests\PostRequest; 
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $posts = Post::getPosts();
        return view('home', compact('posts'));
    }

    public function mypage()
    {
        if(Auth::check()){
            $posts = Post::getPosts(Auth::id());
            return view('mypage', compact('posts'));
        }else{
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.write', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // 画像処理は後ほど追加するため、デフォルトの画像パスが追加されるように調整
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
        } else {
            $imagePath = 'images/default.jpg'; 
        }

        $post = new post;
        $post->user_id = auth()->id();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->image_path = $imagePath;
        $post->save();
        return redirect()->route('dashboard');
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
        return view('blog.detail', compact('post', 'posts'));
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
