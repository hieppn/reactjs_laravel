<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/books',"user\BookController@index");
Route::get('/new-books',"user\BookController@newBook");
Route::get('/books/{id}/show',"user\BookController@show");
Route::post('/login','auth\LoginController@login');
Route::PATCH('/change','auth\LoginController@change');
Route::get('/logout','auth\LoginController@logoutt');
Route::get('/profile','auth\LoginController@profile');
Route::PATCH('/profile','auth\LoginController@editprofile');
Route::post('/register','auth\RegisterController@register');

Route::get('/cart','user\CartController@index')->name('user.cart');
	Route::post('/addcart/{id}','user\CartController@store');
	Route::PATCH('/cart/add/{id}','user\CartController@add');
	Route::PATCH('/cart/subtract/{id}','user\CartController@subtract');
	Route::delete('/cart/{id}','user\CartController@destroy');
	Route::get('/cart/sum','user\CartController@getTotal');

	Route::post('/order','user\OrderController@store');
	Route::post('/order/check','user\OrderController@check');
	Route::get('/order','user\OrderController@index');
	Route::get('/order/books/{id}','user\OrderController@getBook');

	Route::delete('/comment/delete/{id}','user\CommentController@destroy');
	Route::post('/comment/add/{id}','user\CommentController@add');
	Route::get('/comments/{id}','user\CommentController@getComments');

	Route::post('/message','user\MessageController@create');
	Route::get('/message','user\MessageController@index');
