@extends('layouts.admin_panel')
@section('title', 'Изменить программу')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить программу</h1>
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
                            <form method="post" action="{{route('program_admin.update', $program->program_id )}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="benefits">Название программы</label>
                                            <input type="text" value="{{$program->program_name}}" class="form-control"
                                                   id="name"
                                                   name="name" required>
                                        </div>
                                        <label for="name">Направление</label>
                                        <br>
                                        <select required name="dance_type">
                                            @foreach($dance_types as $el)
                                                <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="name">Уровень</label>
                                        <br>
                                        <select required name="level">
                                            @foreach($levels as $el)
                                                <option value="{{$el->level_id}}">{{$el->level_name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <label for="benefits">Количество уроков</label>
                                            <input type="number" value="{{$program->lesson_count}}" class="form-control"
                                                   id="email"
                                                   name="count" required>
                                        </div>
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
