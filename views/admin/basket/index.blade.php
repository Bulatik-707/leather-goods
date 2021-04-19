@extends('layouts.admin_layout')
@section('title', 'Все корзина')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Вся корзина</h1>
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
                                <tr> 
                                    <th>Код заказа</th>
                                    <th>Код изделия</th>
                                    <th>Количество</th>
                                    <th style="width: 40%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все  -->
                            @foreach($baskets as $basket)
                            <tr> 
                                <td>{{$basket['order_id']}}</td>
                                <td>{{$basket['product_id']}}</td>
                                <td>{{$basket['amount']}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('basket.edit', $basket['order_id'])}}">
                                        <i class="fas fa-pencil-alt"></i>Редактировать
                                    </a>
                                    <form action="{{route('basket.destroy', $basket['order_id'])}}" method="POST">
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
