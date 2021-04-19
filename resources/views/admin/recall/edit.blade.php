@extends('layouts.admin_layout')

@section('title', 'Редактировать цвет')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать цвет: {{$recall['name']}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- //Выводим СМС из ColorController.php  метод store -->
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
                <form action="{{route('recall.update', $recall['id'])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group ">
                        <label for="exampleInputRecall">Цвет</label>
                        <input type="text" name="name" value="{{$recall['name']}}" class="form-control" id="exampleInputRecall" 
                            placeholder="Введите название цвета" required>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection