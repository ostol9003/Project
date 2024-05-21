<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index() : View{
        $models = User::where('Is_Active', true)->get();
        return view("User.index", ["models" => $models]);
    }

    public function create() : View{
        $model = new User();
        $model -> created_at = date('Y-m-d'); 
        $model -> updated_at = date('Y-m-d');
        return view("User.create", ["model" => $model]);
    }
    public function edit(int $id) : View{
        $model = User::find($id);
        return view("User.edit", ["model" => $model]);
    }
    
    public function addToDb(Request $request) : RedirectResponse {
        $model = new User();
        $model -> name = $request->input("Name"); 
        $model -> email = $request->input("Email");
        $model -> password = $request->input("Password");
        $model -> created_at = date('Y-m-d');
        $model -> updated_at = date('Y-m-d');
        $model -> isActive = true;
        $model -> save();
        return redirect('/users'); 
     }   
     public function update(Request $request, int $id) : RedirectResponse {
         $model = User::find($id);
         $model -> name = $request->input("Name"); 
         $model -> email = $request->input("Email");
         $model -> password = $request->input("Password");
         $model -> updated_at = date('Y-m-d');
         $model -> save();
         return redirect('/users'); 
      }   
 
      public function delete(Request $request, int $id) : RedirectResponse {
         $model = User::find($id);
         $model -> IsActive = false;
         $model -> save();
         return redirect('/users'); 
      }   
}
