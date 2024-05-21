<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index() : View{
        $models = Category::where('Is_Active', true)->get();
        return view("category.index", ["models" => $models]);
    }

    public function create() : View{
        $model = new Category();
        $model -> created_at = date('Y-m-d'); 
        $model -> updated_at = date('Y-m-d');
        return view("category.create", ["model" => $model]);
    }
    public function edit(int $id) : View{
        $model = Category::find($id);
        return view("category.edit", ["model" => $model]);
    }
    
    public function addToDb(Request $request) : RedirectResponse {
        $model = new Category();
        $model -> name = $request->input("Name"); 
        $model -> created_at = date('Y-m-d');
        $model -> updated_at = date('Y-m-d');
        $model -> isActive = true;
        $model -> save();
        return redirect('/categories'); 
     }   
     public function update(Request $request, int $id) : RedirectResponse {
         $model = Category::find($id);
         $model -> name = $request->input("Name"); 
         $model -> updated_at = date('Y-m-d');
         $model -> save();
         return redirect('/categories'); 
      }   
 
      public function delete(Request $request, int $id) : RedirectResponse {
         $model = Category::find($id);
         $model -> IsActive = false;
         $model -> save();
         return redirect('/categories'); 
      }   
}