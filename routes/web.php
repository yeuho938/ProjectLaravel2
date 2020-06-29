.
-<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\checkLogin;
Route::get('/', function () {
    return view('welcome');
});
// LOGIN
// len duong link dung get // POST lay form/delete
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/login', 'Auth\LoginController@index')->name("auth.login");
// REGISTER
Route::get('/auth/register', 'Auth\RegisterController@index')->name("auth.register");
Route::post('/auth/register', 'Auth\RegisterController@register');

//LOGOUT

Route::get('/home/logout', 'User\HomeController@logout');
Route::post('/home/search', 'User\HomeController@search');


// ADMIN

Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name("admin.dashboard")->middleware('checkLogin');

Route::get('/admin/users', 'Admin\UserController@index');
//Route::post('/admin/users/insert', 'Admin\UserController@store');
Route::delete('/admin/users/{id}', 'Admin\UserController@destroy');

// UERS

Route::get('/home/user', 'User\HomeController@index')->name("home");
Route::get('/user/{id}/detail', 'User\HomeController@detail');

//CART

Route::get('/user/cartindex', 'User\CartController@indexCart');
Route::get('/user/{id}/cart', 'User\CartController@addCart');
Route::delete('/user/cartindex/{id}','User\CartController@destroyCart');
Route::get('/user/cartindex/{id}/increase',"User\CartController@increaseQuantity");
Route::get('/user/cartindex/{id}/crease',"User\CartController@creaseQuantity");

///PAYMENT

Route::get('/user/payment',"User\PaymentController@index");
Route::get('/user/payment/edit',"User\PaymentController@edit");
Route::post('/user/payment/{id}',"User\PaymentController@discount");

// PRODUCT

Route::get('/admin/clothes/create', 'Admin\ClothesController@create');
Route::get('/admin/clothes', 'Admin\ClothesController@index');
Route::post('/admin/clothes/insert', 'Admin\ClothesController@store');
Route::delete('/admin/clothes/{id}', 'Admin\ClothesController@destroy');
Route::get('/admin/clothes/{id}/edit', 'Admin\ClothesController@edit');
Route::patch('/admin/clothes/{id}', 'Admin\ClothesController@update');

// PARTIALS 
// 
Route::get('/partials/header','Admin\ClothesController@header');
Route::get('/partials/head1','Auth\RegisterController@header1');

/// CATEGORY
Route::get('/category/index', 'Admin\CategoryController@index');
Route::get('/category/create', 'Admin\CategoryController@create');
Route::post('/category/store', 'Admin\CategoryController@store');
Route::delete('/category/{id}', 'Admin\CategoryController@destroy');
Route::get('/category/{id}/edit', 'Admin\CategoryController@edit');
Route::patch('/category/{id}', 'Admin\CategoryController@update');

Route::get('/home/productOfCate/{id}', 'User\HomeController@productCate');


/// ORDER
Route::post('/admin/order', 'Admin\OrderController@index');
