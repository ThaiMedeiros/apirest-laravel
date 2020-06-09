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

// rotas de teste do passport
Route::post('register', 'Api\Auth\AuthController@register');
Route::post('logged', 'Api\Auth\AuthController@logged');
Route::match(['get', 'put', 'delete'], 'login', 'Api\Auth\AuthController@login')->name('login');

//esta forma simplificada atende todos os métodos do controlador (POST, PUT or PATCH, GET and DELETE)
Route::apiResource('/products', 'Api\Product\ProductController')->middleware('auth:api');
Route::get('logout', 'Api\Auth\AuthController@logout')->middleware('auth:api');
