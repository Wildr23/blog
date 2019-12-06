<?php

namespace App\Http\Controllers;

use App\Category_post;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Post::paginate(5);
        return view('index',['posts' => $posts,'categories'=>$this->allCategories]);
    }

    public function about()
    {
        return view('about',['categories'=>$this->allCategories]);;
    }

    public function post($id)
    {
        $post=\App\Post::findOrFail($id);
        return view('post', ['post'=>$post]);
    }

    public function new_post()
    {
        return view('new_post', ['categories'=>$this->allCategories]);
    }

    public function posts_by_autor($key)
    {
        $autor = \App\Autor::where('key', '=', $key)->first();
        $posts = \App\Post::where('autor_id','=',$autor->id)->paginate(5);
        return view('posts_by_autor', ['autor' => $autor,'posts'=>$posts,'categories' => $this->allCategories]);
    }

    public function posts_by_category($key)
    {
        $category = \App\Category::where('key', '=', $key)->first();
        return view('posts_by_category', ['category' => $category,'categories' => $this->allCategories]);
    }

    public function store()
    {
        $post = new Post;
        $post->title = request('title');
        $post->body = request('text');
        $post->img = request()->file('image')->store('public/images');
        $post->body = request('text');
        $post->autor_id = Auth::user()->id;
        $post->save();
        $post->categories()->attach(\App\Category::where('categories','=',request('category'))->first());
        $this->index();
    }
}
