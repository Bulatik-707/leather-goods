<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class HomeController extends Controller
{
    //
    public function index2()
    {
        return view('home');
    }
    public function index(){
        //Верни представление home.blade
        return view('home', ['categories'=>Category::all()]);
    }

   
}
