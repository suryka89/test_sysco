<?php

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

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@view_profile')->name('view_profile');
Route::post('/profile/update', 'HomeController@update_profile')->name('update_profile');
Route::post('/profile/update/avatar', 'HomeController@update_profile_avatar')->name('update_profile_avatar');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

// // Check role anywhere
// if (Auth::check() && Auth::user()->hasRole('admin')) {
//     // Do admin stuff here
// } else {
//     // Do nothing
// }

// Check role in route middleware
Route::group(['namespace' => 'User', 'prefix' => 'user', 'middleware' => ['auth', 'roles'], 'roles' => ['user','admin']  ], function () {
    Route::resource('/order', 'OrderController');
    Route::resource('/products', 'ProductsController');
    Route::get("/state",'OrderController@updateState');
    Route::get('/getproducts', 'OrderController@getListProduct')->name('get.products');
});


