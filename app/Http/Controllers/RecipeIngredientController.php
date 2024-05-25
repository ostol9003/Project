<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RecipeIngredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class RecipeIngredientController extends Controller
{
    public function index(): View
    {
        $models = RecipeIngredient::where('Is_Active', true)->get();
        return view("RecipeIngredient.index", ["models" => $models]);
    }

    public function create(): View
    {
        $model = new RecipeIngredient();
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        return view("RecipeIngredient.create", ["model" => $model]);
    }
    public function edit(int $id): View
    {
        $model = RecipeIngredient::find($id);
        return view("RecipeIngredient.edit", ["model" => $model]);
    }

    public function addToDb(Request $request): RedirectResponse
    {
        $model = new RecipeIngredient();
        $model->recipe_id = $request->input("Recipe_id");
        $model->ingredient_id = $request->input("Ingredient_id");
        $model->quantity = $request->input("Quantity");
        $model->unit = $request->input("Unit");
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $model->is_active = true;
        $model->save();
        return redirect('/recipe-ingredient');
    }
    public function update(Request $request, int $id): RedirectResponse
    {
        $model = RecipeIngredient::find($id);
        $model->recipe_id = $request->input("Recipe_id");
        $model->ingredient_id = $request->input("Ingredient_id");
        $model->quantity = $request->input("Quantity");
        $model->unit = $request->input("Unit");
        $model->updated_at = date('Y-m-d');
        $model->save();
        return redirect('/recipe-ingredient');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        $model = RecipeIngredient::find($id);
        $model->is_active = false;
        $model->save();
        return redirect('/recipe-ingredient');
    }
}
