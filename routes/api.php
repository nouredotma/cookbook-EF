<?php

use App\Http\Controllers\Api\RecipeController;
use Illuminate\Support\Facades\Route;

Route::prefix('recipes')->group(function () {
    Route::get('/', [RecipeController::class, 'index']);
    Route::get('/{id}', [RecipeController::class, 'show']);
    Route::post('/', [RecipeController::class, 'store']);
});
