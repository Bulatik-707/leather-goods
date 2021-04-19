<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function show(){
        $colors = Color::all();
        return view('colors', ['colors'=>$colors]);
    }
}
