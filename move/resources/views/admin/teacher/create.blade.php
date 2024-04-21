@extends('layouts.admin_panel')
@section('title', 'Добавить направление')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить преподавателя</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                            </div>
                        @endif
                        <div class="card card-primary">

                            <form method="post" action="{{route('teacher_admin.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="name">Имя преподавателя</label>
                                            <input type="text" class="form-control" id="name"
                                                   name="name" required>
                                        </div>

                                        <label for="name">Направление</label>
                                        <br>
                                        <select required name="dance_type">
                                            @foreach($dance_types as $el)
                                                <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                            @endforeach
                                        </select>
                                        <br> <br>
                                        <div class="form-group">
                                            <label for="experience">Опыт</label>
                                            <input type="text" class="form-control" id="experience"
                                                   name="experience" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialisation">Специализация</label>
                                            <input type="text" class="form-control" id="specialisation"
                                                   name="specialisation" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Фото</label>
                                            <br>
                                            <input type="file" name="teacher_photo" id="teacher_photo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="video_path">Видео</label>
                                            <input type="text" class="form-control" id="video_path"
                                                   name="video_path" required>
                                        </div>
                                        <label for="name">Пользователь</label>
                                        <br>
                                        <select required name="user_id">
                                            @foreach($users as $el)
                                                <option value="{{$el->id}}">{{$el->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
