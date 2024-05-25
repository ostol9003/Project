<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(): View
    {
        $models = Recipe::with('RecipeIngredients.ingredient')
            ->where('Is_Active', true)->where('is_promoted', true);
        return view("home.index", ["models" => $models]);
    }
}
