<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
});

//Login
Route::get('login', function () {
    return view('login');
})->name('login');

Route::post('login', [UserController::class, 'Login']);

//Register
Route::get('signup', function () {
    return view('signup');
})->name('register');

Route::post('signup', [UserController::class, 'Register']);

//Logout
Route::post('logout', [UserController::class, 'Logout']);

//User Data
Route::get('profile', [UserController::class, 'ShowProfile']);

Route::get('usertable', [UserController::class, 'ShowUserTable']);

//Post
Route::get('post/{id}', [PostController::class, 'ReadOne']);

Route::get('posts', [PostController::class, 'ReadAll']);

Route::get('createpost', [PostController::class, 'ShowCreatePage']);

Route::post('post', [PostController::class, 'Create']);

//Route::patch('post/{id}');
//
//Route::delete('post/{id}');

//Comment
Route::get('comments/{id}', [CommentController::class, 'Read']);

Route::post('comment', [CommentController::class, 'Create']);

Route::patch('comment/{id}', [CommentController::class, 'Update']);

Route::delete('comment/{id}', [CommentController::class, 'Delete']);
