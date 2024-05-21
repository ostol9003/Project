<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Ingredient;

class IngredientController extends Controller
{
    public function index() : View{
        $models = Ingredient::where('IsActive', true)->get();
        return view("Ingredient.index", ["models" => $models]);
    }

    public function create() : View{
        $model = new Ingredient();
        $model -> created_at = date('Y-m-d'); 
        $model -> updated_at = date('Y-m-d');
        return view("Ingredient.create", ["model" => $model]);
    }
    public function edit(int $id) : View{
        $model = Ingredient::find($id);
        return view("Ingredient.edit", ["model" => $model]);
    }
    
    public function addToDb(Request $request) : RedirectResponse {
        $model = new Ingredient();
        $model -> name = $request->input("Name"); 
        $model -> quantity = $request->input("Quantity");
        $model -> unit = $request->input("Unit");
        $model -> created_at = date('Y-m-d');
        $model -> updated_at = date('Y-m-d');
        $model -> isActive = true;
        $model -> save();
        return redirect('/categories'); 
     }   
     public function update(Request $request, int $id) : RedirectResponse {
         $model = Ingredient::find($id);
         $model -> name = $request->input("Name"); 
         $model -> quantity = $request->input("Quantity");
         $model -> unit = $request->input("Unit");
         $model -> updated_at = date('Y-m-d');
         $model -> save();
         return redirect('/ingredients'); 
      }   
 
      public function delete(Request $request, int $id) : RedirectResponse {
         $model = Ingredient::find($id);
         $model -> IsActive = false;
         $model -> save();
         return redirect('/ingredients'); 
      }   
}