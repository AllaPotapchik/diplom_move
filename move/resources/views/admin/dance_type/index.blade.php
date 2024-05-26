@extends('layouts.admin_panel')
@section('title', 'Все направления')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">

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
                            <th scope="col"></th>
                            <th scope="col">Назание</th>
                            <th scope="col">Описание</th>
                            <th scope="col">Преимущества</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dance_types as $el)
                            <tr>
                                <th scope="row">{{$el->dance_type_id}}</th>
                                <td>{{$el->title}}</td>
                                <td>{{$el->description}}</td>
                                <td>{{$el->type_benefits}}</td>
                                <td class="text-center d-flex justify-content-evenly">
                                    <a href="{{route('dance_type_admin.edit', $el['dance_type_id'])}}"
                                       class="btn btn-primary rounded-pill px-3 mr-2 "
                                       type="button" id="{{$el->dance_type_id}}">Редактировать</a>
                                    <form method="post" action="{{route('dance_type_admin.destroy', $el['dance_type_id'])}}">
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
