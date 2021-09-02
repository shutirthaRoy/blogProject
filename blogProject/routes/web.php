<?php

use App\Http\Controllers\AboutContactMeController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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
    $all_posts = Post::paginate(2);
    return view('welcome', compact('all_posts'));
})->name('home');


//Extra Resources
Route::get('/about-me', [AboutContactMeController::class, 'aboutMe'])->name('aboutMe');
Route::get('/contact', [AboutContactMeController::class, 'contact'])->name('contactMe');


//Admin
Route::get('/admin', function () {
    return "Hello Admin";
})->middleware('admin');


//Posts
Route::get('/posts', [PostsController::class, 'index'])->name('allPosts');
Route::middleware(['auth:sanctum', 'verified'])->get('/posts/create', [PostsController::class, 'create'])->name('postsCreate');
Route::middleware(['auth:sanctum', 'verified'])->post('/posts/create', [PostsController::class, 'store'])->name('postsStore');
Route::middleware(['auth:sanctum', 'verified'])->get('/preEdit', [PostsController::class, 'preEdit'])->name('postsPreEdit');
Route::middleware(['auth:sanctum', 'verified'])->get('/posts/edit/{id}', [PostsController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->post('/posts/update/{id}', [PostsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->get('/posts/delete/{id}', [PostsController::class, 'delete']);
Route::get('/posts/search-record', [PostsController::class, 'searchDataBase'])->name('Search');



Route::get('/posts/{id}', function ($id) {
    $single_post = Post::find($id);
    return view('posts.singleView', compact('single_post'));
});



//Comments
Route::get('/comments', [CommentsController::class, 'showAllComments'])->name('allComments');
Route::post('/comments/create/{id}', [CommentsController::class, 'storeComments'])->name('commentsStore');
Route::middleware(['auth:sanctum', 'verified'])->get('/comments/delete/{id}', [CommentsController::class, 'deleteComments']);




//Contact 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('panel');
})->name('panel');