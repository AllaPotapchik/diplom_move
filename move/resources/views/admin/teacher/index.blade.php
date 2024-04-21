@extends('layouts.admin_panel')
@section('title', 'Все направления')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все преподаватели</h1>
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
                            <th scope="col">Имя</th>
                            <th scope="col">Направление</th>
                            <th scope="col">Опыт</th>
                            <th scope="col">Специализация</th>
                            <th scope="col">Фото</th>
                            <th scope="col">Видео</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $el)
                            <tr>
                                <th scope="row">{{$el->teacher_name}}</th>
                                <td>{{$el->title}}</td>
                                <td>{{$el->experience}}</td>
                                <td>{{$el->specialisation}}</td>
                                <td><img style="width: 100px; height: auto"
                                         src="{{asset('storage')}}/teachers_photo/{{$el->photo_path}}">
                                </td>
                                <td>{{$el->video_path}}</td>
                                <td class="text-center d-flex justify-content-evenly">
                                    <a href="{{route('teacher_admin.edit', $el->teacher_id)}}"
                                       class="btn btn-primary rounded-pill px-3 mr-2 "
                                       type="button" id="{{$el->teacher_id}}">Редактировать</a>
                                    <form method="post" action="{{route('teacher_admin.destroy', $el->teacher_id)}}">
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
