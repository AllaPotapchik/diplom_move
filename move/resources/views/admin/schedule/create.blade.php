@extends('layouts.admin_panel')
@section('title', 'Добавить занятие')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить занятие</h1>
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

                            <form method="post" action="{{route('schedule_admin.store')}}">
                                @csrf
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
                                        <label for="time">Время</label>
                                        <input type="time" class="form-control" id="time"
                                               name="time" list="time-list"  min="10:00" max="18:00" required>
                                        <datalist id="time-list">
                                            <option value="10:00">
                                            <option value="11:00">
                                            <option value="12:00">
                                            <option value="13:00">
                                            <option value="14:00">
                                            <option value="15:00">
                                            <option value="16:00">
                                            <option value="17:00">
                                            <option value="18:00">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="count">Места</label>
                                        <input type="number" value="15" class="form-control" id="count"
                                               name="count" required>
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
