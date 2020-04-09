<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{provider}', 'SocialsController@redirect')->name('login.provider');
Route::get('login/{provider}/callback', 'SocialsController@Callback')->name('login.callback');

Route::middleware(['auth'])->group(function () {
  Route::resource('channels', 'ChannelsController');
  Route::resource('discussions', 'DiscussionsController');
  Route::resource('forum', 'ForumController');
});
