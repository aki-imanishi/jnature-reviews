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

Route::get('/', 'PlacesController@index');

//会員登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//認証（ログイン、ログアウト）
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function(){ //ログインしているユーザのみ閲覧可能
    //ユーザ詳細を表示
    // Route::resource('users', 'UsersController', ['only' => ['show']]); 
    Route::get('users/{user}', 'UsersController@show'); //画面遷移（画面表示）のみなのでGETでok
    
    //観光地一覧の表示、観光地詳細ページ
    // Route::resource('places', 'PlacesController', ['only' => ['show']]);
    Route::get('places/{place}', 'PlacesController@show'); //画面遷移（画面表示）のみなのでGETでok
    
    //レビュー投稿の操作
    // Route::resource('reviews', 'ReviewsController', ['only' => ['store', 'destroy']]);
    Route::post('reviews', 'ReviewsController@store');
    Route::post('reviews/{review}', 'ReviewsController@destroy');
    
    //保存機能の操作
    Route::group(['prefix' => 'places/{id}'], function(){
        Route::post('save', 'SavePlaceController@store' ); //保存
        Route::post('deleteSave', 'SavePlaceController@destroy'); //保存削除
        Route::get('savedPlaces', 'UsersController@savedPlaces'); //行きたい観光地一覧の表示
    });
    
});

