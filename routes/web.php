<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;

Auth::routes();

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Route::middleware(['auth'])->group(function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('categories', 'CategoriesController');
  Route::resource('posts', 'PostsController');
  Route::resource('tags', 'TagsController');
  Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
  Route::put('restore-posts/{post}', 'PostsController@restore')->name('restore-posts');
});

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
  Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
  Route::get('users', 'UsersController@index')->name('users.index');
  Route::post('users/{user}/make-admin', 'UsersController@make_admin')->name('users.make-admin');
});
