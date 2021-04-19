@extends('layouts.admin_layout')

@section('title', 'Добавить заказ')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить заказ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- //Выводим СМС из CategorieController.php  метод store -->
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="card card-primary">
                <!-- form start -->
                <form action="{{route('order.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Фамилия</label>
                        <input type="text" name="lastname" id="lastname" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                               value="{{ old('lastname') }}" placeholder="Фамилия" required>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="firstname" id="firstname" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('firstname') }}" placeholder="Имя" required>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('email') }}" placeholder="Адрес E-mail" required>
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Телефон</label>
                            <input type="text" name="telephone" id="telephone" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('telephone') }}" required data-inputmask="(999) 999-99-99">

                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <h3>Способ доставки:</h3>
                            <select name="deliverymethod" id="deliverymethod" class="form-control col-12 col-sm-12 col-md-6 col-lg-6" required>
                                <option>Выберите способ доставки</option>
                                @foreach($deliverymethods as $deliverymethod)
                                <option value="{{ old('deliverymethod') }}">{{ old('deliverymethod', $deliverymethod) }}</option>
                                @endforeach

                            </select>

                            <!-- /<div id="accordion">
                                <div class="card col-12 col-sm-12 col-md-6 col-lg-6">
                                    <div class="card-header" id="radOne">
                                        <h5 class="mb-0">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" checked>
                                            <label class="form-check-label" for="exampleRadios1">1</label>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="radOne" data-parent="#accordion">
                                        <div class="card-body">
                                            1Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="padTwo">
                                        <h5 class="mb-0">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <label class="form-check-label" for="exampleRadios2">2</label>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="padTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="padThree">
                                        <h5 class="mb-0">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <label class="form-check-label" for="exampleRadios3">3</label>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="padThree" data-parent="#accordion">
                                        <div class="card-body">
                                            3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <h3>Статус заказа:</h3>
                            <select name="orderstatus" id="orderstatus" class="form-control col-12 col-sm-12 col-md-6 col-lg-6" required>
                                @foreach($orderstatuses as $orderstatus)
                                    <option value="{{ old('orderstatus') }}">{{ old('orderstatus', $orderstatus) }}</option>
                                @endforeach
                            </select>

                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Город</label>
                            <input type="text" name="city" id="city" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('city') }}" placeholder="Введите город">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Адрес</label>
                            <input type="text" name="address" id="address" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('address') }}" placeholder="Введите адрес">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Индекс</label>
                            <input type="text" name="index" id="index" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('index') }}" placeholder="Введите индекс">
                        </div> <!-- / form-group-->
                        <div class="form-group">
                            <label for="name">Комментарий</label>
                            <br>
                            <textarea name="note" rows="3" class="editor form-control col-12 col-sm-12 col-md-6 col-lg-6" id="exampleInputProduct"
                                      placeholder="Комментарий к заказу"></textarea>
                        </div>
                        </div> <!-- / form-group-->

                        <!-- /Card -->
                        <div class="form-group">
                        <h1>Корзина:</h1>
                            <div class="cart">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="">
                                                <div class="table-content table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <!-- <th>Изображения</th> -->
                                                                <th>Изделие</th>
                                                                <th>цена</th>
                                                                <th>Количество</th>
                                                                <th>Всего</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <!-- <td><a href=""><img src="assets/images/product/small-size/1.jpg" alt="Миниатюра тележки Quicky"></a></td> -->
                                                                <td><a href="">Джума Рема п-Джума Рема пола</a></td>
                                                                <td>$46.80</td>
                                                                <!-- <td class="quantity">
                                                                    <label>Количество</label>
                                                                    <div class="basket-plus-minus">
                                                                        <input class="basket-plus-minus-box" value="1" type="text">
                                                                        <input type="text" name="amount" class="form-control col-4" id="exampleInputProduct">
                                                                        <div class="dec qtybutton"><i class="zmdi zmdi-chevron-down"></i></div>
                                                                        <div class="inc qtybutton"><i class="zmdi zmdi-chevron-up"></i></div>
                                                                    <div class="dec qtybutton"><i class="zmdi zmdi-chevron-down"></i></div><div class="inc qtybutton"><i class="zmdi zmdi-chevron-up"></i></div></div>
                                                                </td> -->
                                                                <td>
                                                                    <input type="number" name="amount" id="input-amount" value="1" style="width: 100px;">
                                                                </td>
                                                                <td>$46.80</td>
                                                                <td><a href=""><i  title="Удалять"></i></a></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                            <div>
                                                                <input class="button" name="update_basket" value="Обновить корзину" type="submit">
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5 ml-auto">
                                                        <div class="basket">
                                                            <h2>Итого</h2>
                                                            <ul>
                                                                <li>$118,60</li>
                                                            </ul>
                                                            <!-- <a href=""><button class="btn btn-primary">Переходите к оформлению заказа</button></a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card end -->

                        <div class="form-group d-none" >
                            <label for="name">...</label>
                            <input type="text" name="" id="" class="form-control col-12 col-sm-12 col-md-6 col-lg-6"
                                   value="{{ old('name') }}" placeholder="Введите" required>
                        </div> <!-- / form-group-->

                    </div>
                    <!-- /.card-body -->


                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection
