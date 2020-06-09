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
//Route::get('login', 'Api\Auth\AuthController@login')->name('login');

//esta forma simplificada atende todos os métodos do controlador
Route::apiResource('/products', 'Api\Product\ProductController')->middleware('auth:api');
/*Route::group(['middleware' => ['auth:api']], function(){
    Route::get('/products', 'Api\Product\ProductController@index')->name('products.index');
    Route::get('/products/{id}', 'Api\Product\ProductController@show')->name('products.show');
    Route::put('/products/{id}', 'Api\Product\ProductController@update')->name('products.update');
    Route::post('/products', 'Api\Product\ProductController@store')->name('products.store');
    Route::delete('/products/{id}', 'Api\Product\ProductController@destroy')->name('products.destroy');
});*/
