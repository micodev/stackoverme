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

use App\Events\CommentPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/search', 'AuthenticationController@Search')->name('search');
Route::get('/', 'AuthenticationController@Index')->name('home');
Route::post('/login', 'AuthenticationController@login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route("home");
});
Route::post('/register', 'AuthenticationController@Register');
Route::get('/createIssue', 'IssueFactoryController@Index');
Route::post('/createIssue', 'IssueFactoryController@CreateIssue');
Route::get('/inbox', 'IssueFactoryController@inbox')->name('problems');



Route::get('/main', function () {
    return view('main');
});
Route::post('/problem/{id}/edit', 'CreatedIssueController@EditPost');
Route::post('/problem/like/{id}/', 'CreatedIssueController@LikePost')->name("likePost");
Route::get('/problem/{id}', 'CreatedIssueController@Index')->name("problem");
Route::get('/problem/tag/{tag}', 'CreatedIssueController@tags')->name("tag");
Route::post('/problem/{id}', 'CreatedIssueController@addComment');
Route::post('/problem/{id}/subcomment', 'CreatedIssueController@subcomment');
// Route::get('/problem', function () {
//     return view('problem');
// });
Route::get('/profile', function () {
    return view('profile');
})->name("profile");
Route::post('/editprofile', 'AuthenticationController@editProfile');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');