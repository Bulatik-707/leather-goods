<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Вывести все изделия
    public function products(){
        $products = Product::all();
        return view('products', ['products'=>$products]);
    }
    // public function product(Product $id){
    //      $product = $id->product;
    //     return view('product', ['product'=>$product]);
    // }
    public function product($product_id){
        $product = Product::where('id', $product_id)->firstOrFail();
       return view('product', ['product'=>$product]);
   }


    //Изделия по категории
    public function productsForCategory(Category $category)
    {
        $products = $category->products;
        return view('products',['products'=>$products]);
    }

    // //Изделие
    // public function show(Product $product){
    //     $products = $product->products;
    //     return view('product',['product'=>$products]);
    // }
    //Вывести все изделия
    public function show(){
        $products = Product::all();
        return view('products', ['products'=>$products]);
    }

}
