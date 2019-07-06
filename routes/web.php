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
Route::get('/', 'AuthenticationController@Index');
Route::post('/login', 'AuthenticationController@login');
Route::post('/register', 'AuthenticationController@Register');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/main', function () {
    return view('main');
});
Route::get('/problem', function () {
    return view('problem');
});
Route::get('/profile', function () {
        return view('profile');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
