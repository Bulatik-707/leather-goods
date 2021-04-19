@extends('layouts.layout')
@section('title', 'Каталог')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
    <h2>Каталог изделий</h2>

    <div class="row">
    @foreach($categories_all as $category)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 pt-4">
        <div class="card">
        <a href="{route('products_cat', [$category->id])}}"><img class="card-img-top" src="/storage/app/public/image/{{$category->image}}" alt="{{$category->name}}" style="display: block; height: 250px;"></a>
        <!-- <a href="{{route('category.show', $category->id)}}"><img class="card-img-top" src="/storage/image/{{$category->image}}" alt="{{$category->name}}" style="display: block; height: 250px;"></a> -->
            
            <div class="card-body">
            <h5 class="card-title text-center">{{$category->name}}</h5>
            </div>
        </div>
        </div>
        @endforeach


    </div>
    </div>
</div>

@endsection
