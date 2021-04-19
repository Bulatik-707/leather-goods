@extends('layouts.admin_layout')

@section('title', 'Добавить корзина')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавить корзина</h1>
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
                <form action="{{route('basket.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <!-- //Определение списка  -->
                        <div class="form-group">
                            <label>Заказ</label>
                            <select name="order_id " class="form-control col-6" required>
                                @foreach($orders as $order)
                                    <option value="{{$order['id']}}">{{$order['id']}}</option>
                                @endforeach
                            </select>
                        </div>
                         <!-- //Определение списка  -->
                         <div class="form-group">
                            <label>Изделие</label>
                            <select name="product_id " class="form-control col-6" required>
                                @foreach($producs as $produc)
                                    <option value="{{$produc['id']}}">{{$produc['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group ">
                        <label for="exampleInputCategory">Количество</label>
                        <input type="text" name="amount" class="form-control col-6" id="name" value="{{ old('name') }}"
                            placeholder="Введите количество" required>
                        </div>


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
