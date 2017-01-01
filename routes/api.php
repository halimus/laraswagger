<?php

use Illuminate\Http\Request;

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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    
    //Users route
    $api->get('users', 'App\Http\Controllers\Api\UserController@index');
    $api->get('users/{id}', 'App\Http\Controllers\Api\UserController@show');
   
    
    //Authors route
    $api->get('authors', 'App\Http\Controllers\Api\AuthorController@index');
    $api->get('authors/{id}', 'App\Http\Controllers\Api\AuthorController@show');
    
    //Fields route
    $api->get('fields', 'App\Http\Controllers\Api\FieldController@index');
    $api->get('fields/{id}', 'App\Http\Controllers\Api\FieldController@show');
    
    //Languages route
    $api->get('languages', 'App\Http\Controllers\Api\LanguageController@index');
    $api->get('languages/{id}', 'App\Http\Controllers\Api\LanguageController@show');
    
    //Books route
    $api->get('books', 'App\Http\Controllers\Api\BookController@index');
    $api->get('books/{id}', 'App\Http\Controllers\Api\BookController@show');
    
    
});
