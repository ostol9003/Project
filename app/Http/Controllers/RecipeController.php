<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\User;

class RecipeController extends Controller
{
    public function index(): View
    {
        $models = Recipe::with('RecipeIngredients.ingredient')->where('Is_Active', true)->get();
        return view("Recipe.index", ["models" => $models]);
    }

    public function create(): View
    {
        $model = new Recipe();
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $users = User::all();
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('Recipe.create', [
            'model' => $model,
            'users' => $users,
            'categories' => $categories,
            'ingredients' => $ingredients
        ]);
    }

    public function addToDb(Request $request): RedirectResponse
    {
        $model = new Recipe();
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->cooking_time = $request->input('cooking_time');
        $model->user_id = $request->input('user_id');
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $model->is_active = true;
        $model->save();

        // Attach categories
        $categories = $request->input('categories', []);
        foreach ($categories as $categoryId) {
            $model->categories()->attach(
                $categoryId,
                ['created_at' => now(), 'updated_at' => now()]
            );

            // Attach ingredients with quantities and units
            if ($request->has('ingredients')) {
                foreach ($request->input('ingredients') as $ingredientId => $details) {
                    if (isset($details['checked'])) {
                        $recipeIngredient = new RecipeIngredient();
                        $recipeIngredient->recipe_id = $model->id;
                        $recipeIngredient->ingredient_id = $ingredientId;
                        $recipeIngredient->quantity = $details['Quantity'];
                        $recipeIngredient->unit = $details['Unit'];
                        $recipeIngredient->created_at = date('Y-m-d');
                        $recipeIngredient->updated_at = date('Y-m-d');
                        $recipeIngredient->save();
                    }
                }
            }

            return redirect('/recipes');
        }
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $model = Recipe::find($id);
        $model->title = $request->input("Title");
        $model->description = $request->input("Description");
        $model->cooking_time = $request->input("Cooking_time");
        $model->user_id = $request->input("User_id");
        $model->updated_at = date('Y-m-d');
        $model->save();
        return redirect('/recipes');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        $model = Recipe::find($id);
        $model->is_active = false;
        $model->save();
        return redirect('/recipes');
    }
}
