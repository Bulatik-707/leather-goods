<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $baskets = Basket::all();
        return view('admin.basket.index',[
            'baskets' =>$baskets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $producs = Product::orderBy('name')->get();
        $orders = Order::orderBy('id')->get();
        return view('admin.basket.create',[
            'producs'=>$producs,
            'orders'=>$orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $new_basket = new Basket();
        $new_basket->order_id = $request->order_id;
        $new_basket->product_id = $request->product_id;
        $new_basket->amount = $request->amount;
        $new_basket->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
         //Редактирование
         $categories = Category::orderBy('name')->get();
         $colors = Color::orderBy('name')->get();
         return view('admin.basket.edit', [
             'categories'=>$categories,
             'colors'=>$colors,
             'basket'=>$basket,
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        
        //Создадим новый альбом
        $basket->name = $request->name;
        $basket->color_id = $request->color_id;
        $basket->category_id = $request->category_id;
        $basket->save();
        return redirect()->back()->withSuccess('обнавлено!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        //
        $basket->delete();
        return redirect()->back()->withSuccess(' удалено!');
    }
}
