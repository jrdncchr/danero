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

Route::get('/', 'HomeController@showHome')->name('home');
Route::get('/home', 'HomeController@showHome')->name('home');
Route::get('/stories', 'HomeController@showStories')->name('stories');

Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/login', 'AuthController@showLogin');
Route::post('/login', 'AuthController@login')->name('login');

Route::middleware(['auth'])->group(function () {
	Route::prefix('manage')->group(function() {
		Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

		Route::get('/stories', 'StoryController@index')->name('stories.index');
		Route::get('/stories/create', 'StoryController@create')->name('stories.create');
		Route::post('/stories', 'StoryController@store')->name('stories.store');
		Route::get('/stories/{post}', 'StoryController@show')->name('stories.show');
		Route::post('/stories/{post}/edit', 'StoryController@edit')->name('stories.edit');
		Route::delete('/stories/{post}', 'StoryController@destroy')->name('stories.destroy');
	});
});
