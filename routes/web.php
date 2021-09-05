<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{id}', [HomeController::class, 'show']);
Route::post('/post/{id}', [HomeController::class, 'store']);

// Route::get('/post', function () {
//     return view('admin/posts');
// });

// Route::middleware(['auth','IsAdmin'])->group(function () {
// Route::group(['prefix' => 'admin'], function() {
//     Route::resource('/posts', PostController::class);
//     Route::resource('/tags', TagController::class);
//     Route::resource('/categories', CategoryController::class);
//     Route::resource('/comments', CommentController::class);
//     Route::resource('/users', UserController::class);
// });
// });



// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//     ], function(){



Route::group(['prefix' => 'admin'], function() {
Route::middleware(['auth','IsAdmin'])->group(function () {
        Route::resource('/tags', TagController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/comments', CommentController::class);
});
    Route::resource('/users', UserController::class);
    Route::resource('/posts', PostController::class);
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/posts/publish/{post}', [PostController::class, 'publish']);

// Route::get('/lang/{local}',[HomeController::class, 'lang']);

// });
