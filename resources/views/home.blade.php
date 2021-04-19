@extends('layouts.layout')
@section('title', 'Главная')


@section('content')
<section class="jumbotron text-center bg-light pb-0">
          <div class="container">
              <h1 class="jumbotron-heading">Leather goods</h1>
              <h5>Изделия из натуральной кожи  ручной работы
              На нашем сайте вы можете заказать изделия: кошельки, обложки, мужские ремни, ремешки для часов, калдхолдеры, брелки, аксессуары.
              Доставка Почтой России или CDEK

              </h5>
          </div>
</section>

<div class="py-5 bg-light">
    <div class="container">

    <div class="row">
    @foreach($categories as $category)
        <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-5">
        <div class="card">
        <a href="{{route('category-one.show', $category->id)}}"><img class="card-img-top" src="/storage/app/public/image/{{$category->image}}" alt="{{$category->name}}" style="display: block; height: 250px;"></a>
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
