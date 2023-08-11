<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/my_page', [\App\Http\Controllers\MyPlaceController::class, 'index']);

Route::get('/movies', [\App\Http\Controllers\MovieController::class, 'index']);
Route::get('/movies/create', [\App\Http\Controllers\MovieController::class, 'create']);
Route::get('/movies/update', [\App\Http\Controllers\MovieController::class, 'update']);
Route::get('/movies/delete', [\App\Http\Controllers\MovieController::class, 'delete']);
Route::get('/movies/first_or_create', [\App\Http\Controllers\MovieController::class, 'firstOrCreate']);
Route::get('/movies/update_or_create', [\App\Http\Controllers\MovieController::class, 'updateOrCreate']);

Route::get('/posts', \App\Http\Controllers\Post\IndexController::class)->name('post.index');
Route::get('/posts/create', \App\Http\Controllers\Post\CreateController::class)->name('post.create');
Route::post('/posts', \App\Http\Controllers\Post\StoreController::class)->name('post.store');
Route::get('/posts/{post}', \App\Http\Controllers\Post\ShowController::class)->name('post.show');
Route::get('/posts/{post}/edit', \App\Http\Controllers\Post\EditController::class)->name('post.edit');
Route::patch('/posts/{post}', \App\Http\Controllers\Post\UpdateController::class)->name('post.update');
Route::delete('/posts/{post}', \App\Http\Controllers\Post\DestroyController::class)->name('post.destroy');

Route::group(['namespace' => '\App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=> 'admin'], function() {
   Route::get('/posts', \Post\IndexController::class)->name('admin.post.index');
});


Route::get('/posts/update', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [\App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/first_or_create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
