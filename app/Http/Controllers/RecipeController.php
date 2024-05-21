<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use App\Models\Recipe;

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
        return view("Recipe.create", ["model" => $model]);
    }
    public function edit(int $id): View
    {
        $model = Recipe::find($id);
        return view("Recipe.edit", ["model" => $model]);
    }

    public function addToDb(Request $request): RedirectResponse
    {
        $model = new Recipe();
        $model->title = $request->input("Title");
        $model->description = $request->input("Description");
        $model->cooking_time = $request->input("Cooking_time");
        $model->user_id = $request->input("User_id");
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $model->isActive = true;
        $model->save();
        return redirect('/recipes');
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
        $model->IsActive = false;
        $model->save();
        return redirect('/recipes');
    }
}
