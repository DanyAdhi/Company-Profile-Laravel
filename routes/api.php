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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('about', 'Api\DataController@get_about');

// route category
Route::get('categories', 'Api\DataController@get_categories');
Route::get('categories/{category}', 'Api\DataController@get_category_by_id');

// route article
Route::get('articles', 'Api\DataController@get_all_articles');
Route::get('articles/{article}', 'Api\DataController@get_article_by_id');
