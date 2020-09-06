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

Route::get('/', function () {
    return view('admin/login');
});

Route::patch('/admin/profile/{id}','auth\LoginController@profileAdmin');
Route::get('/auth/logout','auth\LoginController@logout');
Route::get('/admin/dashboard','Admin\DashBoardController@index')->name('admin.dashboard');
Route::get('/admin/books/','admin\book\BookController@index')->name('admin.books');	
Route::post('/admin/book/{id}/edit','admin\book\BookController@edit');
Route::patch('/admin/book/{id}','admin\book\BookController@update');
Route::get('/admin/book/create','admin\book\BookController@create');
Route::post('/admin/books/','admin\book\BookController@store');
Route::delete('/admin/book/{id}','admin\book\BookController@destroy');
Route::post('/login-admin','auth\LoginController@loginAdmin');
Route::get('/admin/user/','admin\user\UserController@index')->name('admin.user');
Route::post('/admin/user/{id}/edit','admin\user\UserController@edit');
Route::patch('/admin/user/{id}','admin\user\UserController@update');
Route::delete('/admin/user/{id}','admin\user\UserController@destroy');

Route::get('/admin/category/','admin\category\CategoryController@index')->name('admin.category');
Route::get('/admin/category/create','admin\category\CategoryController@create');
Route::post('/admin/category/','admin\category\CategoryController@store');
Route::post('/admin/category/{id}/edit','admin\category\CategoryController@edit');
Route::patch('/admin/category/{id}','admin\category\CategoryController@update');
Route::delete('/admin/category/{id}','admin\category\CategoryController@destroy');
Route::get('/admin/order/','admin\order\OrderController@index')->name('admin.order');
Route::get('/order/book/{id}/show',"admin\order\OrderController@show");
Route::get('/message',"admin\message\MessageController@getUser");
Route::get('/message/{id}',"admin\message\MessageController@getMessage");
Route::post('/message/{id}','admin\message\MessageController@chat');
