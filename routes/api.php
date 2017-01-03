<?php
//use Illuminate\Http\Request;



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


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    
    //Users route
    $api->get('users', 'App\Http\Controllers\Api\UserController@index');
    $api->get('users/{id}', 'App\Http\Controllers\Api\UserController@show');
    $api->post('users/create', 'App\Http\Controllers\Api\UserController@store');
    $api->put('users/{id}', 'App\Http\Controllers\Api\UserController@update'); 
    $api->delete('users/{id}', 'App\Http\Controllers\Api\UserController@destroy'); 
   
    //Authors route
    $api->get('authors', 'App\Http\Controllers\Api\AuthorController@index');
    $api->get('authors/{id}', 'App\Http\Controllers\Api\AuthorController@show');
    $api->post('authors/create', 'App\Http\Controllers\Api\AuthorController@store');
    $api->put('authors/{id}', 'App\Http\Controllers\Api\AuthorController@update'); 
    $api->delete('authors/{id}', 'App\Http\Controllers\Api\AuthorController@destroy'); 
    
    //Fields route
    $api->get('fields', 'App\Http\Controllers\Api\FieldController@index');
    $api->get('fields/{id}', 'App\Http\Controllers\Api\FieldController@show');
    $api->post('fields/create', 'App\Http\Controllers\Api\FieldController@store');
    $api->put('fields/{id}', 'App\Http\Controllers\Api\FieldController@update'); 
    $api->delete('fields/{id}', 'App\Http\Controllers\Api\FieldController@destroy'); 
    
    //Languages route
    $api->get('languages', 'App\Http\Controllers\Api\LanguageController@index');
    $api->get('languages/{id}', 'App\Http\Controllers\Api\LanguageController@show');
    $api->post('languages/create', 'App\Http\Controllers\Api\LanguageController@store');
    $api->put('languages/{id}', 'App\Http\Controllers\Api\LanguageController@update'); 
    $api->delete('languages/{id}', 'App\Http\Controllers\Api\LanguageController@destroy'); 
    
    //Books route
    $api->get('books', 'App\Http\Controllers\Api\BookController@index');
    $api->get('books/{id}', 'App\Http\Controllers\Api\BookController@show');
    $api->post('books/create', 'App\Http\Controllers\Api\BookController@store');
    $api->put('books/{id}', 'App\Http\Controllers\Api\BookController@update'); 
    $api->delete('books/{id}', 'App\Http\Controllers\Api\BookController@destroy'); 
    
    
});
