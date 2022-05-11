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

//会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証（ログイン、ログアウト）
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function(){ //ログインしているユーザのみ閲覧可能
    //ユーザ詳細を表示
    Route::resource('users', 'UsersController', ['only' => ['show']]); 
    
    //観光地一覧の表示、観光地詳細ページ
    Route::resource('places', 'PlacesController', ['only' => ['index', 'show']]);
    
    //レビュー投稿の操作
    Route::resource('reviews', 'ReviewsController', ['only' => ['create', 'store', 'destroy']]);
});

