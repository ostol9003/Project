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
        return view("Recipe.index", ["models" => $models]);
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
        $model->recipe_id = $request->input("Recipe_id");
        $model->category_id = $request->input("Category_id");
        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        $model->isActive = true;
        $model->save();
        return redirect('/recipe-category');
    }
    public function update(Request $request, int $id): RedirectResponse
    {
        $model = RecipeCategory::find($id);
        $model->recipe_id = $request->input("Recipe_id");
        $model->category_id = $request->input("Category_id");
        $model->updated_at = date('Y-m-d');
        $model->save();
        return redirect('/recipe-category');
    }

    public function delete(Request $request, int $id): RedirectResponse
    {
        $model = RecipeCategory::find($id);
        $model->IsActive = false;
        $model->save();
        return redirect('/recipe-category');
    }
}
