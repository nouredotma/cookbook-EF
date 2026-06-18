<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'preparation_time' => 'required|integer|gt:0',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'description' => 'required|string|min:20',
        ], [
            'name.required' => 'Name is required.',
            'preparation_time.required' => 'Preparation time is required.',
            'preparation_time.integer' => 'Preparation time must be a number.',
            'preparation_time.gt' => 'Preparation time must be greater than 0.',
            'difficulty.required' => 'Difficulty is required.',
            'difficulty.in' => 'Difficulty must be Easy, Medium or Hard.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 20 characters.',
        ]);

        Recipe::create($request->all());

        return redirect('/recipes')->with('success', 'Recipe added successfully.');
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required|string',
            'preparation_time' => 'required|integer|gt:0',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'description' => 'required|string|min:20',
        ], [
            'name.required' => 'Name is required.',
            'preparation_time.required' => 'Preparation time is required.',
            'preparation_time.integer' => 'Preparation time must be a number.',
            'preparation_time.gt' => 'Preparation time must be greater than 0.',
            'difficulty.required' => 'Difficulty is required.',
            'difficulty.in' => 'Difficulty must be Easy, Medium or Hard.',
            'description.required' => 'Description is required.',
            'description.min' => 'Description must be at least 20 characters.',
        ]);

        $recipe->update($request->all());

        return redirect('/recipes')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return redirect('/recipes')->with('success', 'Recipe deleted successfully.');
    }
}
