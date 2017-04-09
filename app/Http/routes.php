<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});


Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController'
]);

*/

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'SessionController@destroy');

Route::get('/', 'PostController@index')->name('home');

// onko kirjautunut?

Route::group(['middleware' => 'auth'], function () {
  Route::get('/posts/create', 'PostController@create');
  Route::post('/posts', 'PostController@store');
  Route::post('/posts/{post}/comments', 'CommentController@store');

});

// guest


Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/tags/{tag}', 'TagController@index');

// admin-näkymä & pyynnöt

Route::group(['middleware' => ['auth', 'adminOnly']], function () {
  Route::get('/users', 'AdminController@index');
  Route::get('/users/{user}', 'AdminController@show');
  Route::post('users/{user}/delete', 'AdminController@destroy');
  Route::post('users/{user}/moderate', 'AdminController@makeMod');
  Route::post('users/{user}/demoderate', 'AdminController@unmakeMod');

});

// Vähän ankea toteutus halutulle toiminnallisuudelle != roolit

Route::group(['middleware' => ['auth', 'modOnly']], function () {
  Route::post('posts/{post}/edit', 'PostController@update');
  Route::get('posts/{post}/edit', 'PostController@edit');
  Route::post('posts/{post}/delete', 'PostController@destroy');


});

//Route::auth();
//Route::get('/home', 'HomeController@index');
