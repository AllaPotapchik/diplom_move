@extends('layouts.admin_panel')
@section('title', 'Все направления')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все направления</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                </div>
            @endif
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Имя</th>
                            <th scope="col">Почта</th>
{{--                            <th scope="col">Пароль</th>--}}
                            <th scope="col">Телефон</th>
                            <th scope="col">Тип пользователя</th>
                            <th scope="col">Баланс</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $el)
                            <tr>
                                <th scope="row">{{$el->name}}</th>
                                <td>{{$el->email}}</td>
{{--                                <td>{{$el->password}}</td>--}}
                                <td>{{$el->phone}}</td>
                                <td>{{$el->type_name}}</td>
                                <td>{{$el->point_balance}}</td>
                                <td class="text-center d-flex justify-content-evenly">
                                    <a href="{{route('user_admin.edit', $el->id)}}"
                                       class="btn btn-primary rounded-pill px-3 mr-2 "
                                       type="button" id="{{$el->id}}">Редактировать</a>
                                    <form method="post" action="{{route('user_admin.destroy', $el->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill px-3 delete_btn">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
