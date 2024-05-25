<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function index() : View{
        $models = Ingredient::where('Is_Active', true)->get();
        return view("ingredient.index", ["models" => $models]);
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
        $model -> created_at = date('Y-m-d');
        $model -> updated_at = date('Y-m-d');
        $model -> is_active = true;
        $model->url = $request->input('url');
        $model -> save();
        return redirect('/categories'); 
     }   
     public function update(Request $request, int $id) : RedirectResponse {
         $model = Ingredient::find($id);
         $model -> name = $request->input("Name"); 
         $model -> updated_at = date('Y-m-d');
         $model->url = $request->input('url');
         $model -> save();
         return redirect('/ingredients'); 
      }   
 
      public function delete(Request $request, int $id) : RedirectResponse {
         $model = Ingredient::find($id);
         $model -> is_active = false;
         $model -> save();
         return redirect('/ingredients'); 
      }   
}