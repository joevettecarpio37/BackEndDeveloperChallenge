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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/userTimeline', function()
{
	return Twitter::getUserTimeline(['screen_name' => 'thujohn', 'count' => 20, 'format' => 'json']);
});

Route::get('/searchTweets/{q}', 'TwitterController@search')->name('search');

Route::get('/randTweets', 'TwitterController@rand_word')->name('rand_word');

Route::post('/addActivity', 'ActivityLogController@add');

Route::get('/test', function() {
	return Response::json(App\ActivityLog::all()->where('user_id', '=', '1'));
});