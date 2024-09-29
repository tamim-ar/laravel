<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::with('user')->get();
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen'])->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost'])->middleware('auth');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware('auth');

