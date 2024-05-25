<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeIngredient;
use App\Models\User;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $name = $request->input('name');

        if ($name) {
            $models = Recipe::with('RecipeIngredients.ingredient')
                ->where('Is_Active', true)
                ->where('title', 'LIKE', "%$name%")
                ->get();
        } else {
            $models = Recipe::with('RecipeIngredients.ingredient')->where('Is_Active', true)->get();
        }
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
        return view('recipe.create', [
            'model' => $model,
            'users' => $users,
            'categories' => $categories,
            'ingredients' => $ingredients
        ]);
    }

    public function edit(int $id): View
    {
        $model = Recipe::with('categories')->with('user')->find($id);
        $users = User::all();
        $categories = Category::all();
        return view("recipe.edit", ["model" => $model, "users" => $users, "categories" => $categories]);
    }


    public function addToDb(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'cooking_time' => 'required|integer|min:1',
            'ingredients.*.Quantity' => 'required_with:ingredients.*.checked|numeric|min:0.01',
            'ingredients.*.Unit' => 'required_with:ingredients.*.checked|string|max:5',
        ]);

        $model = new Recipe();
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->cooking_time = $request->input('cooking_time');
        $model->user_id = $request->input('user_id');
        $model->url = $request->input('url');
        $model->is_promoted = $request->input('is_promoted') ? true : false;
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $model->is_active = true;
        $model->save();


        $categories = $request->input('categories', []);
        foreach ($categories as $categoryId) {
            $model->categories()->attach(
                $categoryId,
                ['created_at' => now(), 'updated_at' => now()]
            );


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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'cooking_time' => 'required|integer|min:1',
            'ingredients.*.Quantity' => 'required_with:ingredients.*.checked|numeric|min:0.01',
            'ingredients.*.Unit' => 'required_with:ingredients.*.checked|string|max:5',
        ]);

        $model = Recipe::find($id);
        $model->title = $request->input("title");
        $model->description = $request->input("description");
        $model->cooking_time = $request->input("cooking_time");
        $model->user_id = $request->input("user_id");
        $model->url = $request->input('url');
        $model->is_promoted = $request->input('is_promoted') ? true : false;
        $model->updated_at = date('Y-m-d');
        $model->save();
        return redirect('/recipes');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        $model = Recipe::find($id);

        if ($model) {
            $model->is_active = false;
            $model->save();

            RecipeCategory::where('recipe_id', $model->id)
                ->update(['is_active' => false, 'updated_at' => now()]);

            $model->recipeIngredients()->update(['is_active' => false, 'updated_at' => now()]);
        }

        return redirect('/recipes');
    }
}
