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
Route::get('/', "HomeController@index");

Route::get('/about', "HomeController@about")->name('about');

Route::get('/post/{id}',"HomeController@post")->name('post');

Route::get('/new_post', "HomeController@new_post")->name('new_post');

Route::get('/contact', function () {return view('contact');})->name('contact');

Route::get('/services', function () {return view('services');})->name('services');

Route::get('/autor/{key}', "HomeController@posts_by_autor")->name('posts_by_autor');

Route::get('/category/{key}', "HomeController@posts_by_category")->name('posts_by_category');

Route::post('/create', "HomeController@store");


Auth::routes();
