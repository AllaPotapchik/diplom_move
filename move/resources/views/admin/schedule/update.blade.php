@extends('layouts.admin_panel')
@section('title', 'Изменить занятия')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить занятия</h1>
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
                            <form method="post" action="{{route('schedule_admin.update', $schedule->id )}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Направление</label>
                                        <br>
                                        <select required name="dance_type" style="width: 50%">
                                            @foreach($dance_types as $el)
                                                <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Преподаватель</label>
                                        <br>
                                        <select required name="teacher" style="width: 50%">
                                            @foreach($teachers as $el)
                                                <option value="{{$el->teacher_id}}">{{$el->teacher_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">Уровень</label>
                                        <br>
                                        <select required name="level" style="width: 50%">
                                            @foreach($levels as $el)
                                                <option value="{{$el->level_id}}">{{$el->level_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">День</label>
                                        <br>
                                        <select required name="day" style="width: 50%">
                                            @foreach($days as $el)
                                                <option value="{{$el->day_id}}">{{$el->day_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">Время</label>
                                        <input type="time" class="form-control" value="{{$schedule->time }}" id="time"
                                               name="time" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="benefits">Места</label>
                                        <input type="text" class="form-control" value="{{$schedule->available_count }}"
                                               id="count"
                                               name="count" required>
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
