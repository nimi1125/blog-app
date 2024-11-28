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
    public function home(Request $request)
    {
        $search = $request->input('search', '');

        if ($search) {
            $posts = $this->post->where('title', 'like', "%{$search}%")
                                ->orWhere('content', 'like', "%{$search}%")
                                ->paginate(9)
                                ->withQueryString();
        } else { 
            $posts = $this->post->getPosts();
        }

        return view('home', compact('posts', 'search'));
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
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('blog.write', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $image = $request->file('image_path');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('img'),  $imageName);
        $imageUrl = 'img/' . $imageName;        

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
}
