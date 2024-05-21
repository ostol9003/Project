<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index() : View{
        return view("home.index");
    }
}
