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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/play', 'WelcomeController@play')->name('play');
Route::post('/updateProfile/{id}', 'WelcomeController@updateProfile')->name('update.profile');
Route::post('/customLogin', 'Auth\LoginController@customLogin')->name('customLogin');
Route::post('/changePassword/{id}', 'WelcomeController@changePassword')->name('update.password.change');
Route::get('/store', 'StoreController@index')->name('store');
Route::get('/store/category/{id}', 'StoreController@showByCategory')->name('store.category');
Route::get('/store/asset/{id}', 'StoreController@showAsset')->name('store.asset');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::get('/blog/post/{id}', 'BlogController@showPost')->name('blog.post');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


