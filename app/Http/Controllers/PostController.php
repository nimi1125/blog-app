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
    public function index()
    {
        $posts = Post::select('posts.*', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->orderBy('posts.updated_at', 'desc')
            ->paginate(9);

        if (Auth::check()) {
            return view('dashboard', compact('posts'));
        } else {
            return view('welcome', compact('posts'));
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
        //postsテーブルから最新の3件を取得する
        $posts = Post::orderBy('id','desc')->take(3)->get();
        if (is_null($post)) {
            // データが見つからない場合の処理
            return view('blog.detail', ['error' => 'データがありません']);
        } else {
            // データが見つかった場合の処理
            return view('blog.detail',compact('post','posts'));
        }
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
