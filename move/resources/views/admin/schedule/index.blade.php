@extends('layouts.admin_panel')
@section('title', 'Все занятия')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все занятия</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Направление</th>
                            <th scope="col">Преподаватель</th>
                            <th scope="col">Уровень</th>
                            <th scope="col">День</th>
                            <th scope="col">Время</th>
                            <th scope="col">Места</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedule as $el)
                            <tr>
                                <th scope="row">{{$el->title}}</th>
                                <td>{{$el->teacher_name}}</td>
                                <td>{{$el->level_name}}</td>
                                <td>{{$el->day_name}}</td>
                                <td>{{$el->time}}</td>
                                <td>{{$el->available_count}}</td>
                                <td class="text-center d-flex justify-content-evenly">
                                    <a href="{{route('schedule_admin.edit', $el->id)}}"
                                       class="btn btn-primary rounded-pill px-3 mr-2 "
                                       type="button" id="{{$el->id}}">Редактировать</a>
                                    <form method="post" action="{{route('schedule_admin.destroy', $el->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill px-3 delete_btn">
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>

@endsection
