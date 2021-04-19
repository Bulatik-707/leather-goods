@extends('layouts.layout')
@section('title', 'Изделие')
@section('content')
    <!-- <div class="container mtopcont shadow-lg">
    <img class="card-img-top my-3" src="{asset('/storage/image/'.$product->image)}}" alt=""  style="display: block; height: 250px;">
    <h2>Изделие: {$product->name}}</h2>
    <p>Цвет: {$product->color->name}}</p>
    <p>Описание: {$product->description}}</p>
    <p>Цена: {$product->price}} руб.</p>
    <div class="card">
        // <button type="submit" class="btn btn-danger mb-3">Заказать</button>
        <button type="submit" class="btn btn-outline-primary">Добавить в корзину</button>
    </div>
</div>-->
    <script>
        $(document).ready(function () {
            //Обрабатываем нажатие кнопки добавления
            $('basket_button').click(function (event) {
                event.preventDefault()
                addToBasket()
            })
        })
        function addToBasket(){ //Вызвать Ф. "addToBasket" при клике на кнопку
            let id = $('.details_name').data('id')
            let kol = parseInt($('amount').val())
            let total_kol = parseInt($('.basket-kol').text())
            total_kol += kol
            $('.basket-kol').text(total_kol)
            //console.lod(total_kol)
            $.ajax({
                url: "{{route('addToBasket')}}",
                type: "POST",
                data: { //Передать параметр, код продукта в корзине
                    id: 99,
                    val: val,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data)
                }
            });
        }
    </script>

    <div class="main py-5 bg-light">
    <div class="container">

    <div class="row">
        <div class="col-9">
            <h1 class="my-3">{{$product->name}}</h1>
            <img class="card-img-top my-3" src="{{asset('/storage/image/'.$product->image)}}" alt=""  style="display: block; width:300px; height: 300px;">
            <p>Цвет: {{$product->color->name}}</p>
            <p>Цена: {{$product->price}} руб.</p>
            <div>
                <!-- <button type="submit" class="btn btn-danger mb-3">Заказать</button> -->
                <!-- <button type="submit" class="btn btn-outline-primary">Добавить в корзину</button> -->
            </div>
        </div>


    </div>
    <div class="row">
    <div class="col-md-6">
    <!-- Форма для добавления товара в корзину -->
    <form action="{{ route('addToBasket', ['id' => $product->id]) }}"
          method="post" class="form-inline" enctype="multipart/form-data">
        @csrf
        <label for="input-quantity">Количество</label>
        <input type="text" name="amount" id="input-amount" value="1"
               class="form-control mx-2 w-25">
        <button type="submit" class="btn btn-success basket_button">Добавить в корзину</button>
    </form>
</div>

    </div>
    </div>
</div>


    <section class="bg-light-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop-tabs">
                        <ul class="custom-flex nav nav-tabs">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab">Описание</a>
                            </li>
                            <li class="nav-item">
                                <a href="#add-info" class="nav-link" data-toggle="tab">Комментарии</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#review" class="nav-link" data-toggle="tab">Reviews <span>(3)</span></a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade " id="description">
                                <div class="tab-inner">
                                    <p class="fw-500 mb-xl-40">{{$product->description}}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add-info">
                                <div class="tab-inner">
                                    <div class="table-responsive shop-table">
                                        <table class="table no-margin">
                                           Здесь будут коменты юзверей
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review">
                                <div class="tab-inner">
                                    <!-- Comments -->
                                  <!--   <div class="post-comments">
                                        <h3 class="fw-600 mb-xl-40">Comments</h3>
                                        <ul class="comments-list custom mb-xl-40">
                                            <li>
                                                <div class="comment-img">
                                                    <img src="assets/images/comment-1.jpg" alt="img">
                                                </div>
                                                <div class="comment-desc">
                                                    <div class="desc-top">
                                                        <h6>Rosalina Kelian</h6>
                                                        <span class="date">19th May 2020</span>
                                                        <a href="#" class="reply-link"><i class="far fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat.
                                                    </p>
                                                </div>
                                                <ul class="children custom">
                                                    <li>
                                                        <div class="comment-img">
                                                            <img src="assets/images/comment-2.jpg" alt="img">
                                                        </div>
                                                        <div class="comment-desc">
                                                            <div class="desc-top">
                                                                <h6>Rosalina Kelian<span class="saved"><i class="fas fa-bookmark"></i></span></h6>
                                                                <span class="date">19th May 2020</span>
                                                                <a href="#" class="reply-link"><i class="far fa-reply"></i>Reply</a>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                                aliquip ex ea commodo consequat.
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div class="comment-img">
                                                    <img src="assets/images/comment-3.jpg" alt="img">
                                                </div>
                                                <div class="comment-desc">
                                                    <div class="desc-top">
                                                        <h6>Arista Williamson</h6>
                                                        <span class="date">19th May 2020</span>
                                                        <a href="#" class="reply-link"><i class="far fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat.
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="comment-form">
                                        <h3 class="fw-600 mb-xl-40">Post Comments</h3>
                                        <form action="#" method="POST">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-box form-group">
                                                        <textarea name="#" rows="6" class="form-control form-control-custom" placeholder="Type your comments..."></textarea>
                                                        <span class="icon text-orange">
                                                            <i class="fal fa-pencil-alt"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-box form-group">
                                                        <input type="text" name="#" class="form-control form-control-custom" placeholder="Type your name...">
                                                        <span class="icon text-orange">
                                                            <i class="fal fa-user"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-box form-group">
                                                        <input type="email" name="#" class="form-control form-control-custom" placeholder="Type your email...">
                                                        <span class="icon text-orange">
                                                            <i class="fal fa-envelope"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-box form-group">
                                                        <input type="text" name="#" class="form-control form-control-custom" placeholder="Type your website...">
                                                        <span class="icon text-orange">
                                                            <i class="fal fa-globe"></i>
                                                        </span>
                                                    </div>
                                                    <button type="submit" class="theme-btn btn-orange">Post Comment <i class="fal fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


