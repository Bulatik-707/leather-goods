@extends('layouts.admin_layout')

@section('title', 'Редактирование категории')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактировать категори: {{$category['name']}}</h1>
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
                <form action="{{route('category.update', $category['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group ">
                        <label for="exampleInputCategory">Категория</label>
                        <!-- <input type="text" name="name" value="{$category['name']}}" class="form-control" id="exampleInputCategory"
                            placeholder="Введите название категории" required> -->
                        <input type="text" class="form-control col-6" id="name"
                                name="name" value="{{ old('name', $category->name)}}">


                        </div>
                        <!-- Изображение -->
                        <div class="form-group ">
                            <label for="exampleInputCategory">Изображение</label>
                            <img src="/storage/app/public/image/{{ $category->image }}" id="showImage" alt="{{$category['name']}}" class="my-3 card-img-top img-jumbo" style="display: block; width: 150px;">
                            <input type="file" class="form-control" id="image" name="image" onchange="loadImage(this)">
                            <!-- //Показать выбраное Изображение -->
                            <script>
                                function loadImage(e){
                                    showImage.bidden = false;
                                    showImage.src = URL.createObjectURL(e.files[0]);
                                    showImage.onload = function(){
                                      URL.revokeObjectURL(e.src);
                                    }
                                }
                                tinymce.init({
                                  selector: 'img',
                                  plugins: 'advlist autolink lists charmap print preview hr',
                                  toolbar_mode: 'floating',
                                })
                            </script>
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
