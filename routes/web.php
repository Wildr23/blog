<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    $posts = \App\Post::paginate(5);
    $categories = \App\Category::distinct()->get();
    return view('index',['posts' => $posts,'categories'=>$categories]);
});


Route::get('/about', function () {
    $categories = \App\Category::distinct()->get();
    return view('about',['categories'=>$categories]);
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/post/{id}', function ($id) {
    $post=\App\Post::where('id',$id)->first();
    return view('post', ['post'=>$post]);
})->name('post');

Route::get('/new_post', function () {
    return view('new_post');
})->name('new_post');

Route::get('/autor/{key}', function ($key) {
    $autor = \App\Autor::where('key', '=', $key)->first();
    $posts = \App\Post::where('autor_id','=',$autor->id)->paginate(5);
    $categories = \App\Category::distinct()->get();
    return view('posts_by_autor', ['autor' => $autor,'posts'=>$posts,'categories' => $categories]);
})->name('posts_by_autor');


Route::get('/category/{key}', function ($key) {
    $category = \App\Category::where('key', '=', $key)->first();
    $categories = \App\Category::distinct()->get();
    return view('posts_by_category', ['category' => $category,'categories' => $categories]);
})->name('posts_by_category');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
