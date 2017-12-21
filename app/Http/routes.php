<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);
Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/shopping-cart/{id}', [
    'uses' => 'ProductController@getRemoveFromCart',
    'as' => 'product.removeFromCart'
]);
Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/login', [
    'uses' => 'ProductController@login',
    'as' => 'product.login'
]);
Route::post('/products', [
    'uses' => 'ProductController@loginSet',
    'as' => 'product.loginSet'
]);
Route::get('/index', [
    'uses' => 'ProductController@logout',
    'as' => 'product.logout'
]);
Route::post('/checkout', [
    'uses' => 'ProductController@checkout',
    'as' => 'product.checkout'
]);
Route::get('/products', [
    'uses' => 'SecurityController@getProducts',
    'as' => 'security.products'
]);
Route::get('/delete/{id}', [
    'uses' => 'SecurityController@deleteProduct',
    'as' => 'security.delete'
]);
Route::get('/update/{id}', [
    'uses' => 'SecurityController@updateProduct',
    'as' => 'security.update'
]);
Route::get('/product', [
    'uses' => 'SecurityController@getProduct',
    'as' => 'security.product'
]);
Route::post('/product', [
    'uses' => 'SecurityController@addProduct',
    'as' => 'security.addproduct'
]);