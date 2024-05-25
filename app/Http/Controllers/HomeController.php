<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index() : View{
        $models = Recipe::where('Is_Active', true)->get()->where('is_promoted',true);
        return view("recipe.index", ["models" => $models]);
    }
}
