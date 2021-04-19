@extends('layouts.admin_layout')
@section('title', 'Все цвета')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Все цвета</h1>
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
                                <th> Название  </th>
                                <th style="width: 20%">  </th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- //Выводим все категории -->
                            @foreach($colors as $color)
                            <tr> <td> {{$color['id']}} </td>
                                <td> {{$color['name']}} </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="{{route('color.edit', $color['id'])}}">
                                        <i class="fas fa-pencil-alt"></i>Редактировать
                                    </a>
                                    <form action="{{route('color.destroy', $color['id'])}}" method="POST"    >
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