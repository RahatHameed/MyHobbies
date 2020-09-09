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
    return view('starting_page');
});

Route::get('/info', function () {
    return view('info');
});

/*Route::get('/test/{name}/{age}', 'HobbyController@index');*/

Route::resource('hobby',"HobbyController");
Route::resource('tag',"TagController");
Route::resource('user', 'UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Filtered Hobby
Route::get('/hobby/tag/{tag_id}', 'HobbyTagController@getFilteredHobbies')->name('FilterHobbiesByTagID');

// Attach, Detach hobbies to tags
Route::get('/hobby/{hobby_id}/tag/{tag_id}/attach', 'HobbyTagController@attachTag')->name('attachTag')->middleware('auth');
Route::get('/hobby/{hobby_id}/tag/{tag_id}/detach', 'HobbyTagController@detachTag')->name('detachTag')->middleware('auth');


// Delete Images of Hobby
Route::get('/delete-images/hobby/{hobby_id}', 'HobbyController@deleteImages');

// Edit User
Route::get('/user/{user_id}/edit', 'UserController@edit');

// Delete Images of User
Route::get('/delete-images/user/{user_id}', 'UserController@deleteImages');