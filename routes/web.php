<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // return view('posts', ['posts' => Post::all()]);
    return view('posts', [
        'posts' => Post::latest()->get(),
        'categories' => Category::all()]);
})->name('home');

// Route::get('posts/{post}', function ($id) {
Route::get('posts/{post:slug}', function (Post $post) { //Post::where('slug',$post)->firstOrFail()

    // $post =  Post::find($id);

    return view('post', [
        // 'post' =>$post
        'post' => $post
    ]);

});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory'=>$category,
        'categories' => Category::all(),
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author) {
    // dd($author);
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all(),
    ]);
});

