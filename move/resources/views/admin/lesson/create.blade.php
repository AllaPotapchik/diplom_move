@extends('layouts.admin_panel')
@section('title', 'Добавить урок')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить урок</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-6">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                            </div>
                        @endif
                        <div class="card card-primary">

                            <form method="post" action="{{route('lesson_admin.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input type="text" class="form-control"  id="name"
                                               name="name" min="3" max="50" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="program">Программа</label>
                                        <br>
                                        <select required name="program" style="width: 50%"  >
                                            @foreach($program as $el)
                                                <option value="{{$el->program_id}}">{{$el->program_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">Направление</label>
                                        <br>
                                        <select required name="dance_type" style="width: 50%">
                                            @foreach($dance_types as $el)
                                                <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Номер</label>
                                        <input type="number" class="form-control"  id="number"
                                               name="number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" class="form-control"  id="description"
                                               name="description" min="10"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lesson_video">Видео</label>
                                        <br>
                                        <input type="file"  id="lesson_video"
                                               name="lesson_video" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="duration">Длительность</label><br>
                                        <select  name="duration" style="width: 50%" id="duration" required>
                                            <option selected value="00:30"> 30 минут</option>
                                            <option value="00:40"> 40 минут</option>
                                            <option value="01:00"> 1 час </option>
                                            <option value="01:20"> 1 час 20 минут</option>
                                        </select>
{{--                                        <input type="text" class="form-control"  id="duration"--}}
{{--                                               name="duration" required>--}}
                                    </div>
                                    <div class="form-group">
                                        <label for="equipment">Оборудование</label>
                                        <input type="text" class="form-control"  id="equipment"
                                               name="equipment" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
