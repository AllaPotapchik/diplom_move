@extends('layouts.admin_panel')
@section('title', 'Изменить преподавателя')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить преподавателя</h1>
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
                            <form method="POST" action="{{route('teacher_admin.update',$teacher->teacher_id )}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="name">Имя преподавателя</label>
                                            <input type="text" value="{{$teacher->teacher_name}}" class="form-control"
                                                   id="name"
                                                   name="name" min="3" max="30" required>
                                        </div>

                                        <label for="name">Направление</label>
                                        <br>
                                        <select required name="dance_type" style="width: 50%">
                                            @foreach($dance_types as $el)
                                                <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                            @endforeach
                                        </select>
                                        <br> <br>
                                        <div class="form-group">
                                            <label for="experience">Опыт</label>
                                            <input type="text" value="{{$teacher->experience}}" class="form-control"
                                                   id="experience"
                                                   name="experience" min="3" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="specialisation">Специализация</label>
                                            <input type="text" value="{{$teacher->specialisation}}" class="form-control"
                                                   id="specialisation"
                                                   name="specialisation" min="3" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="photo">Фото</label>
                                            <br>
                                            <input type="file" value="{{$teacher->photo_path}}" name="teacher_photo"
                                                   id="teacher_photo"  required>
                                        </div>
                                        <div class="form-group">
                                            <label for="video_path">Видео</label>
                                            <input type="text" value="{{$teacher->video_path}}" class="form-control"
                                                   id="video_path"
                                                   name="video_path" required>
                                        </div>
                                        <label for="name">Пользователь</label>
                                        <br>
                                        <select required name="user_id" style="width: 50%">
                                            @foreach($users as $el)
                                                <option value="{{$el->id}}">{{$el->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
