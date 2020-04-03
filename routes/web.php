<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
  Route::resource('categories', 'CategoriesController');
  Route::resource('posts', 'PostsController');
  Route::resource('tags', 'TagsController');
  Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
  Route::put('restore-posts/{post}', 'PostsController@restore')->name('restore-posts');
  Route::get('users/profile', 'ProfilesController@index')->name('users.profile');
  Route::put('users/profile-update', 'ProfilesController@update')->name('users.profile.update');
});

Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('users', 'UsersController@index')->name('users.index');
  Route::get('users/create', 'UsersController@create')->name('users.create');
  Route::post('users/store', 'UsersController@store')->name('users.store');
  Route::post('users/{user}/make-admin', 'UsersController@make_admin')->name('users.make-admin');
  Route::post('users/{user}/remove-admin', 'UsersController@remove_admin')->name('users.remove-admin');
  Route::get('settings', 'SettingsController@index')->name('settings.index');
  Route::put('settings/update', 'SettingsController@update')->name('settings.update');
});
