<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingradient;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::with('ingradients')->get();
        // dd($recipes);
        return view('Racipe.index', ['himus' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingradient::all();
        return view('Racipe.create', ['ingredients' => $ingredients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string',
            'instruction' => 'required|string',
            'ingradients' => 'required|array',
        ]);

        $recipe = Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'instruction' => $request->instruction,
        ]);

        $recipe->ingradients()->attach($request->ingradients);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        $ingredients = $recipe->ingradients;
        return view('Racipe.show', ['recipe' => $recipe, 'ingredients' => $ingredients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->ingradients()->detach();
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully');
    }
}
