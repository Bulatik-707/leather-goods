@extends('layouts.admin_layout')
@section('title', 'Все изделия')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Все изделия</h1>
            </div>
        </div>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
        @endif

    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr> <th style="width: 5%">ID</th>
                                <th>Категорие</th>
                                <th>Название изделия</th>
                                <th>Изображение</th>
                                <th>Цвет</th>
                                <th>Описание</th>
                                <th>Цена</th>
                                <th style="width: 20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все категории -->
                            @foreach($products as $product)
                            <tr> <td>{{$product['id']}}</td>
                                <td>{{$product['category_id']}}</td>
                                <td>{{$product['name']}}</td>
                                <td><img src="{{ asset('/storage/image/'.$product->image) }}"  style="display: block; width: 150px; height: 150px;"></td>
                                <td>{{$product['color_id']}}</td>
                                <td>{{$product['description']}}</td>
                                <td>{{$product['price']}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('product.edit', $product['id'])}}">
                                        <i class="fas fa-pencil-alt"></i>Редактировать
                                    </a>
                                    <form action="{{route('product.destroy', $product['id'])}}" method="POST"    >
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash"></i>Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        </div>
    </div>
</section>

@endsection
