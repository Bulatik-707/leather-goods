@extends('layouts.admin_layout')
@section('title', 'Все заказы')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Все заказы</h1>
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
                                <th>Клиент</th>
                                <th>Изделие</th>
                                <th>Количество</th>
                                <th>Способ доставки</th>
                                <th>Статус заказа</th>
                                <th>Город</th>
                                <th>Адрес</th>
                                <th>Индекс</th>
                                <th>Комментарий</th>
                                <th>Дата заказа</th>
                                <th style="width: 20%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все категории -->
                            @foreach($orders as $order)
                            <tr> <td>{{$order['id']}}</td>
                                <td>{{$order['client_id']}}</td>
                                <td>{{$order['client_id']}}</td>
                                <td>{{$order['client_id']}}</td>
                                <td>{{$order['deliverymethod']}}</td>
                                <td>{{$order['orderstatus']}}</td>
                                <td>{{$order['city']}}</td>
                                <td>{{$order['address']}}</td>
                                <td>{{$order['index']}}</td>
                                <td>{{$order['note']}}</td>
                                <td>{{$order['date']}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('order.edit', $order['id'])}}">
                                        <i class="fas fa-pencil-alt"></i>Редактировать
                                    </a>
                                    <form action="{{route('order.destroy', $order['id'])}}" method="POST"    >
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
