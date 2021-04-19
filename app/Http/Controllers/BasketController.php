<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
//use Darryldecode\Cart\Cart;

use Illuminate\Http\Request;




class BasketController extends Controller
{
    //

    public function index2()
    {
        return view('basket');
    }
    public function index3()
    {
        return view('order');
    }

    /**
     * Показывает корзину покупателя
     */
    public function index() {
        $products = Product::all();
        $baskets = Basket::all();
        return view('basket', [
            'products'=> $products,
            'baskets'=> $baskets
        ]);
    }


    public function prodAdd(Request $request, $id){

        $baskets = Basket::where('product_id', $id);
        return view('basket',[
            'baskets'=>$baskets
        ]);

        // $productBasket = Product::where('id',  $id->id)->first();
        // $amount = $request->input('amount');
        // return view('basket', [
        //    'product'=>$productBasket
        // ]);
    }


    // public function addToBasket(Request $request){
    //     $product = Product::where('id', $request->id)->first();

    //     if(!isset($_COOKIE['order_id'])) setcookie('order_id', uniqid());
    //     $order_id = $_COOKIE['order_id'];
    //     \Cart::session($order_id);
    //    // return response()->json(['id' => $request->id]);
    //     \Cart::add([
    //         'id' => $product->id,
    //         'name' => $product->name,
    //         'price' => $product->price,
    //         'quantity' => $request->kol,
    //         //Доп. поля добавить
    //         'attributes' => array()//[
    //            // 'image' =>$product->images[0]->image
    //        // ]
    //     ]);

    //     return response()->json(\Cart::getContent());

    // }


}



