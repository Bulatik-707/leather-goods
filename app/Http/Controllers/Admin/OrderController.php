<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Вывод  (desc - вывести сначала новые записи)
        $orders = Order::all();//::orderBy('id')->get();
        $clients = Client::all();
        return view('admin.order.index',[
            'orders' =>$orders,
            'clients'=>$clients
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Добавить
        return view('admin.order.create', [
            'deliverymethods' => ['Самовывоз', 'Почта России', 'CDEK'],
            'orderstatuses' => ['Новый','Подтвержден','Отменен','Выполняется','Выполнен'],
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
        $new_client = new Client();
        $new_client->lastname = $request->lastname;
        $new_client->firstname = $request->firstname;
        $new_client->email = $request->email;
        $new_client->telephone = $request->telephone;
        $new_client->save();
        //
        $new_order = new Order();
        $new_order->client_id = $request->client_id;
        $new_order->deliverymethod = $request->deliverymethod;
        $new_order->orderstatus = $request->orderstatus;
        $new_order->city = $request->city;
        $new_order->address = $request->address;
        $new_order->index = $request->index;
        $new_order->note = $request->note;
        $new_order->save();

        $new_basket = new Basket();
        $new_basket->order_id = $request->order_id;
        $new_basket->product_id = $request->product_id;
        $new_basket->amount = $request->amount;
        $new_basket->save();

        return redirect()->back()->withSuccess(' успешно добавлен');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //Редактирование
        return view('admin.order.edit', [
            'order'=>$order
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->name = $request->name;
        $order->save();

        return redirect()->back()->withSuccess('Цвет обнавлен!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return redirect()->back()->withSuccess('Цвет удален!');

    }
}
