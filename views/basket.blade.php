@extends('layouts.layout')
@section('title', 'корзина')


@section('content')
<div class="container mtopcont shadow-lg">

   <h1>Ваша корзина</h1>
        <div> 
            <!-- <button type="submit" class="btn btn-danger mb-3">Заказать</button> -->
        </div>
            <!-- <button type="submit" class="btn btn-outline-danger mb-4 mt-0 offset-md-9" href="#">Очистить корзину</button> -->
        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
                <th></th>
            </tr>

            @foreach($baskets as $basket)
            <tr>
                <!-- <td>{$basket->order->id}}</td> -->
                <td>{{$basket->product->name}}</td>
                <!-- <td><a href="{route('product_id', [$product->id])}}">{$basket->product->name}}</a></td> -->
                <td>{{$itemPrice = $basket->product->price}}</td>
                <td>
                <!--   <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <i class="fas fa-minus-square">--</i>
                        </button> -->
                        <input type="number" name="amount" id="input-amount" value="1" style="width: 100px;">
                <!--   <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                            <i class="fas fa-plus-square">++</i>
                        </button> -->
                </td>
                <td></td>
                <td>
                    <form action="{{route('product.destroy', $basket->product->id)}}" method="POST"   >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                            <i class="fas fa-trash"></i>Удалить
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <th colspan="4" class="text-right">Итого</th>
                <th>44444</th>
            </tr>
        </table>
    <div>
        <button type="submit" class="btn btn-danger pl-29" href="#">Заказать</button>
        <!-- <button class="btn btn-primary" href="#">Продолжить покупки</a></button> -->
        <!-- <button class="btn btn-primary" href="#">Обновить</button> -->
    </div>
</div>
@endsection
