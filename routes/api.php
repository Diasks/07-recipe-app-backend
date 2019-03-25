<?php



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

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::get('users/{user}', 'UserController@show');
    Route::get('lists/{email}', 'ListController@index');
    Route::post('lists/add', 'ListController@store');
    Route::patch('lists/{list}', 'ListController@update');
    Route::delete('lists/{list}/{recipeId}', 'ListController@move');
     Route::get('lists/{id}', 'ListController@show');
        Route::delete('lists/{id}', 'ListController@delete');
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthControllerr@me');

});












