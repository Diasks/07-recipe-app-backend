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

    //hämta alla listor
    // Route::get('recipeLists/{email}', 'RecipeListController@index');
    Route::get('lists/{email}', 'ListController@index');
    

    
    // //skapa en ny lista
    // Route::post('recipeLists', 'RecipeListController@store');
    
    //uppdatera en befintlig lista
    // Route::put('recipeLists/{recipeList}', 'RecipeListController@update');
    
    //adda recept till databas
    // Route::post('recipeLists/add', 'RecipeListController@store');

    Route::post('lists/add', 'ListController@store');

    Route::patch('lists/{list}', 'ListController@update');
    Route::delete('lists/{list}/{recipeId}', 'ListController@delete');
     //hämta en specifik lista
     Route::get('lists/{id}', 'ListController@show');
    
        Route::delete('lists/{id}', 'ListController@delete');
    
    //ta bort lista
    // Route::delete('recipeLists/{recipeList}', 'RecipeListController@delete');
    // Route::delete('lists/{recipeList}', 'ListController@delete');

    
    //register 
    
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthControllerr@me');

});












