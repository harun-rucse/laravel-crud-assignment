<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect('/recipes');
});

Route::get('/recipes/create', 'App\Http\Controllers\RecipeController@create')->name('recipes.create');

Route::post('/recipes', 'App\Http\Controllers\RecipeController@store')->name('recipes.store');

Route::get('/recipes', 'App\Http\Controllers\RecipeController@index')->name('recipes.index');

Route::get('/recipes/{recipe}', 'App\Http\Controllers\RecipeController@show')->name('recipes.show');

Route::delete('/recipes/{recipe}', 'App\Http\Controllers\RecipeController@destroy')->name('recipes.destroy');

Route::get('/ingredients', 'App\Http\Controllers\IngradientController@index')->name('ingredients.index');

Route::get('/ingredients/{ingredient}', 'App\Http\Controllers\IngradientController@show')->name('ingredients.show');
