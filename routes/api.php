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

Route::namespace('Api')
    ->prefix('apartments')
    ->group(function(){
    Route::get('/', 'PageController@index');
    Route::get('/dettaglio-appartamento/?id={id}', 'PageController@show');
    Route::get('/search/{radius}', 'PageController@search');
    // Route::get('/sqm={sqm}', 'PageController@sqm');
    // Route::get('/post-per-categoria/{slug}', 'PageController@getPostByCategory');
    // Route::get('/post-per-tag/{slug}', 'PageController@getPostByTag');
    // Route::get('/post-cat-tag/{catSlug}/{tagSlug}', 'PageController@getPostsByCatTag');
});
