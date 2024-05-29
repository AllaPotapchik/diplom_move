@extends('layouts.admin_panel')
@section('title', 'Изменить урок')

@section('content')

    <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить урок</h1>
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

                    <div class="col-lg-10">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                            </div>
                        @endif
                        <div class="card card-primary">
                            <form method="post" action="{{route('lesson_admin.update', $lesson->lesson_id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Название</label>
                                        <input type="text" value="{{$lesson->lesson_name}}" class="form-control"
                                               id="name"
                                               name="name" min="3" max="50" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="program">Программа</label>
                                        <br>
                                        <select required name="program" style="width: 50%">
                                            @foreach($programs as $el)
                                                @if($el->program_id==$selected_program->program_id)
                                                    <option selected
                                                            value="{{$el->program_id}}">{{$el->program_name}}</option>
                                                @else
                                                    <option value="{{$el->program_id}}">{{$el->program_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">Направление</label>
                                        <br>
                                        <select required name="dance_type" style="width: 50%">
                                            @foreach($dance_types as $el)
                                                @if($el->dance_type_id==$selected_dance_type->dance_type_id)
                                                    <option selected
                                                            value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                                @else
                                                    <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="number">Номер</label>
                                        <input type="number" value="{{$lesson->number}}" class="form-control"
                                               id="number"
                                               name="number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <textarea type="text" class="form-control"
                                               id="description" style="resize: none"
                                               name="description" required>{{$lesson->lesson_description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="lesson_video">Видео</label>
                                        <br>
                                        <video controls width="300px">
                                            <source src="{{asset('storage')}}/lesson_video/{{$lesson->lesson_video}}"
                                                    type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video><br>
                                        <input type="file" style="color: white" value="{{$lesson->lesson_video}}"
                                               id="lesson_video"
                                               name="lesson_video">
                                    </div>
                                    <div class="form-group">
                                        <label for="duration">Длительность</label><br>
										<?php $select_options = [
											'<option value="00:30"> 30 минут</option>',
											'<option value="00:40"> 40 минут</option>',
											'<option value="01:00"> 1 час</option>',
											'<option value="01:20"> 1 час 20 минут</option>'
										];

										for ( $i = 0; $i < sizeof( $select_options ); $i ++ ) {
											if ( substr( $select_options[ $i ], 15, 5 ).':00' == $lesson->lesson_duration ) {
                                                $select_options[ $i ] = substr_replace($select_options[ $i ], ' selected ', 7, 0);
											}
										}
										?>

                                        <select name="duration" style="width: 50%" id="duration" required>
                                            @foreach($select_options as $option)
                                                {!! $option !!}
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="equipment">Оборудование</label>
                                        <input type="text" value="{{$lesson->equipment}}" class="form-control"  id="equipment"
                                               name="equipment" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
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
