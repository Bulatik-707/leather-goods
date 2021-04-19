<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category; //Категории
use App\Models\Color; //Цвета
use App\Models\Product; //Изделия
use App\Models\Client; //Клиенты
use App\Models\Recall; //Отзовы
use App\Models\Basket; //Корзина
use App\Models\Order; //Заказы


class HomeController extends Controller
{
    public function index()
    {
        //Кол-во *(Кат, Изд, Заказов) --> в пер. $**_count, (Products_count - см. назв. миграций)

        //вывести\отправить на resources\views\admin\home\index.blade.php)

        //в {{$**_count}}
        $Categories_count = Category::all()->count();
        $Colors_count = Color::all()->count();
        $Products_count = Product::all()->count(); //Изделия
        $Clients_count = Client::all()->count();
        $Recalls_count = Recall::all()->count(); //Отзывы
        $Baskets_count = Basket::all()->count();
        $Orders_count = Order::all()->count(); //Заказы

        return view('admin.home.index', [

            'Colors_count'=>$Colors_count,
            'Categories_count'=>$Categories_count,
            'Products_count'=>$Products_count,
            'Orders_count'=>$Orders_count,
            'Baskets_count'=>$Baskets_count,
            'Recalls_count'=>$Recalls_count
        ]);
    }


}
