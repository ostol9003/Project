<?php

namespace App\Http\Controllers;

use App\Models\RecipeCategory;
use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class RecipeCategoryController extends Controller
{
    public function index(): View
    {
        $models = RecipeCategory::where('Is_Active', true)->get();
        return view("RecipeCategory.index", ["models" => $models]);
    }

    public function create(): View
    {
        $model = new RecipeCategory();
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        return view("RecipeCategory.create", ["model" => $model]);
    }
    public function edit(int $id): View
    {
        $model = RecipeCategory::find($id);
        return view("RecipeCategory.edit", ["model" => $model]);
    }

    public function addToDb(Request $request): RedirectResponse
    {
        $model = new RecipeCategory();
        $model->recipe_id = $request->input("recipe_id");
        $model->category_id = $request->input("category_id");
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $model->is_active = true;
        $model->save();
        return redirect('/recipe-category');
    }
    public function update(Request $request, int $id): RedirectResponse
    {
        $model = RecipeCategory::find($id);
        $model->recipe_id = $request->input("recipe_id");
        $model->category_id = $request->input("category_id");
        $model->updated_at = date('Y-m-d');
        $model->save();
        return redirect('/recipe-category');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        $model = RecipeCategory::find($id);
        $model->is_active = false;
        $model->save();
        return redirect('/recipe-category');
    }
}
