<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::paginate(10);

        return response()->json([
            'success' => true,
            'data' => $recipes,
        ]);
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return response()->json([
                'success' => false,
                'message' => 'Recette introuvable',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $recipe,
        ]);
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string',
            'preparation_time' => 'required|integer|gt:0',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'description' => 'required|string|min:20',
        ], [
            'name.required' => 'Le champ nom est obligatoire.',
            'preparation_time.required' => 'Le champ temps de préparation est obligatoire.',
            'preparation_time.integer' => 'Le temps de préparation doit être un nombre entier.',
            'preparation_time.gt' => 'Le temps de préparation doit être supérieur à 0.',
            'difficulty.required' => 'Le champ difficulté est obligatoire.',
            'difficulty.in' => 'La difficulté doit être Easy, Medium ou Hard.',
            'description.required' => 'Le champ description est obligatoire.',
            'description.min' => 'La description doit contenir au moins 20 caractères.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $recipe = Recipe::create($validator->validated());

        return response()->json([
            'success' => true,
            'data' => $recipe,
        ], 201);
    }
}
