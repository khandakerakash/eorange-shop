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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// sdfsdf
Route::get('/test','TestController@index');
Route::get('/product','TestController@product');
Route::get('/product/{id}','TestController@getaProduct');
Route::get('/info','TestController@info');
// sfdsfsdafsd

Route::get('category/{slug}/{min?}/{max?}','api\FrontApiController@categoryProduct')->name('apicategoryproduct');
Route::get('categories','api\FrontApiController@listCategory')->name('apiallcategory');
Route::get('sort/{slug}/{sort}','api\FrontApiController@sortCategoryProduct')->name('apiProductSorting');
Route::get('maincategory/{type}/{slug}','api\FrontApiController@getMainCategoryImage');
