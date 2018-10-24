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

//get = is specifying type of request
// you can also use Route::post
Route::get('/dashboard', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::get('/', 'PagesController@getHome');


/* 
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

*/
Route::get('/messages', 'MessageController@getMessages');

Route::post('/contact/submit', 'MessageController@submit');
Route::post('/messages/delete', 'MessageController@deleteMessage');
Route::post('/messages/update', 'MessageController@editMessage');

//Route that uses url value get/post
/*Route::get('users/{id}/{name}', function ($id, $name) {
    return 'This is user ' .$name.' with an id of '.$id;
}); */

Route::resource('posts', 'PostController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
