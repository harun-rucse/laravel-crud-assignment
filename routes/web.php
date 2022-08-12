<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return redirect('/recipes');
});

Route::get('/recipes', 'App\Http\Controllers\RecipeController@index')->name('recipes.index');

Route::get('/recipes/{recipe}', 'App\Http\Controllers\RecipeController@show')->name('recipes.show');

Route::get('/ingredients', 'App\Http\Controllers\IngradientController@index')->name('ingredients.index');

Route::get('/ingredients/{ingredient}', 'App\Http\Controllers\IngradientController@show')->name('ingredients.show');
