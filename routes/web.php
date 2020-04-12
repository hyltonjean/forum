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

Route::resource('channels', 'ChannelsController');
Route::get('/channel/{channel}', 'ForumController@channel')->name('channel');
Route::resource('discussions', 'DiscussionsController');
Route::resource('forum', 'ForumController');

Route::middleware(['auth'])->group(function () {
  Route::get('discussion/watch/{id}', 'WatchersController@watch')->name('discussion.watch');
  Route::get('discussion/unwatch/{id}', 'WatchersController@unwatch')->name('discussion.unwatch');
  Route::post('discussion/reply/{id}', 'DiscussionsController@reply')->name('discussion.reply');
  Route::get('/reply/like/{id}', 'RepliesController@like')->name('reply.like');
  Route::get('/reply/unlike/{id}', 'RepliesController@unlike')->name('reply.unlike');
  Route::get('/reply/{id}/edit', 'DiscussionsController@reply_edit')->name('reply.edit');
  Route::put('/reply/update/{id}', 'DiscussionsController@reply_update')->name('reply.update');
  Route::get('/discussion/reply/best-answer/{id}', 'RepliesController@best_answer')->name('discussion.best_answer');
});
