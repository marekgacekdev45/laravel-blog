<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostCommentsController;

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

Route::post('newsletter', function () {
    request()->validate([
        'email'=>'required|email'
    ]);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us12'
    ]);



try{

    $response = $mailchimp->lists->addListMember("8e159b04ad", [
        "email_address" => request('email'),
        "status" => "subscribed",
    ]);
}catch(\Exception $e){
    throw ValidationException::withMessages([
        'email'=>'Podany email nie może zostać użyty'
    ]);
}
    


    return redirect('/')->with('success','Zapisałeś się do newslettera');
})->name('newsletter.subscribe');




Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comments.store');



Route::get('authors/{author:username}', function (User $author) {
    // dd($author);
    return view('posts.index', [
        'posts' => $author->posts,

    ]);
});


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostController::class,'create'])->name('admin.post.create')->middleware(('admin'));
Route::post('admin/posts/create',[PostController::class,'store'])->name('admin.post.store')->middleware(('admin'));