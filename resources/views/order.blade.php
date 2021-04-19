@extends('layouts.layout')
@section('title', 'заказ')


@section('content')
<div class="container mtopcont shadow-lg">
<h1>Оформление заказа</h1>
        <p>Здесь будет форма оформления</p>
        <div class="form-group row">
            <label class="col-3 col-form-label mr-2">Логин</label>
            <div class="col-8">
            <p class="form-control-plaintext">ТЕКСТ</p>
            </div>
        </div>
        <form>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>

</form>

<h1>Ваша корзина</h1>
        <!-- @if (count($products))  
            @php
                $productCost = 0;
            @endphp -->

        <table class="table table-bordered">
            <tr>
                <th>№</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
            </tr>
                    <!-- @foreach($products as $product)
                        @php
                            $itemPrice = $product->price;
                            $itemQuantity =  $product->pivot->amount;
                            $itemCost = $itemPrice * $itemQuantity;
                            $productCost = $productCost + $itemCost;
                    @endphp -->
                <tr>
                        <td>аааааа</td>
                    <td>
                            <a href="{{ route('category/product', [$product->id]) }}">{{ $product->name }}</a>
                    </td>
                        <td>10</td>
                    <td>
                            <form action="{{ route('basket.minus', ['product_id' => $product->id]) }}"
                            method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-minus-square">--</i>
                            </button>
                        </form>
                            <span class="mx-1">5</span>
                            <form action="{{ route('basket.plus', ['product_id' => $product->id]) }}"
                            method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-plus-square">++</i>
                            </button>
                        </form>
                    </td>
                            <td>50</td>
                    <td>
                                <form action="{{ route('basket.remove', ['product_id' => $product->id]) }}"
                              method="post">
                            @csrf
                            <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                <i class="fas fa-trash-alt text-danger"></i>X
                            </button>
                        </form>
                    </td>
                </tr>
                    @endforeach
            <tr>
                <th colspan="4" class="text-right">Итого</th>
                        <th>50</th>
            </tr>
        </table>
        <!-- @else
            <p>Ваша корзина пуста</p>
        @endif -->

    <div>
        <!-- <button type="submit" class="btn btn-danger mb-3">Заказать</button> -->
        <button type="submit" class="btn btn-primary">sssss</button>
    </div>
</div>                  
@endsection