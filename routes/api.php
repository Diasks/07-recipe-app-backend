<?php

use Illuminate\Http\Request;
use App\RecipeList;
use App\User;

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




Route::post('login', 'Auth\LoginController@login');




Route::middleware('jwt.auth')->group(function(){
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::get('users/{user}', 'UserController@show');

//hämta alla listor
Route::get('recipeLists', 'RecipeListController@index');

//hämta en specifik lista
Route::get('recipeLists/{recipeList}', 'RecipeListController@show');

//skapa en ny lista
Route::post('recipeLists', 'RecipeListController@store');

//uppdatera en befintlig lista
Route::put('recipeLists/{recipeList}', 'RecipeListController@update');


//ta bort lista
Route::delete('recipeLists/{recipeList}', 'RecipeListController@delete');


//register 
  
Route::post('register', 'Auth\RegisterController@register');








