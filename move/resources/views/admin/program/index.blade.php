@extends('layouts.admin_panel')
@section('title', 'Все программы')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все программы</h1>
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
                            <th scope="col">Название</th>
                            <th scope="col">Направление</th>
                            <th scope="col">Уровень</th>
                            <th scope="col">Количество уроков</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $el)
                            <tr>
                                <th scope="row">{{$el->program_name}}</th>
                              <td>{{$el->title}}</td>
                                <td>{{$el->level_name}}</td>
                             <td>{{$el->lesson_count}}</td>

                                <td class="text-center d-flex justify-content-evenly">
                                    <a href="{{route('program_admin.edit', $el->program_id)}}"
                                       class="btn btn-primary rounded-pill px-3 mr-2 "
                                       type="button" id="{{$el->program_id}}">Редактировать</a>
                                    <form method="post" action="{{route('program_admin.destroy', $el->program_id)}}">
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
