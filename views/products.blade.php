@extends('layouts.layout')
@section('title', 'Изделия')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
    <h2>Изделия</h2>
    <div class="row">
    @foreach($products as $product)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 pt-4">
        <div class="card">
        <!-- <a href="{route('product.show', $product->id)}}"><img class="card-img-top"  src="{asset('/storage/image/'.$product->image)}}" alt="{{$product->name}}" style="display: block; height: 250px;"></a> -->
        <a href="{{route('product_id', [$product->id])}}"><img class="card-img-top"  src="{{asset('/storage/app/public/image/'.$product->image)}}" alt="{{$product->name}}" style="display: block;"></a>
            <div class="card-body">
            <h4 class="card-title">{{$product->name}}</h4>
            <p class="card-title text-center"><b>Цена: </b> {{$product->price}} руб.</p>
            </div>
            <div class="card-body">
                <!-- <button type="submit" class="btn btn-danger mb-3">Заказать</button> -->
                <form class="form-inline" action="{{route('add', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="amount" id="input-amount" value="1" class="d-none">
                    <button type="submit" class="btn btn-outline-primary">Добавить в корзину</button>
                </form>
            </div>
        </div>

        </div>
        @endforeach
        <style>
        .card .btn{
            
        }
        </style>

    </div>
    </div>
</div>
@endsection

