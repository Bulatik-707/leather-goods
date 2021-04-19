<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        return view('home', ['categories'=>Category::all()]);
    }
    public function categories(){
        //
        return view('categories', ['categories_all'=>Category::all()]);
    }
    //Изделия по категории
    public function show(Category $category){
        $products = $category->products;
        return view('products', ['products'=>$products]);
    }

}
