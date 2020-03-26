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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {

    // Make it inline so its beautiful
    //$articles = App\Article::latest()->get();

    return view('about', [
        'articles' => App\Article::take(3)->latest()->get(),
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

Route::get('test', function () {
    return view('test', [
        'name' => request('name'),
    ]);
});

Route::get('/posts/{post}', 'PostsController@show');

Route::get('contact', 'ContactController@show');
Route::post('contact', 'ContactController@store');

// Testing Notification
Route::resource('payment', 'PaymentController')->middleware('auth');
Route::get('notifications', 'UserNotificationController@show')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
