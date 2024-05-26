@extends('layouts.admin_panel')
@section('title', 'Добавить программу')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить программу</h1>
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

                            <form method="post" action="{{route('program_admin.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="benefits">Название программы</label>
                                            <input type="text" class="form-control" id="name"
                                                   name="name" min="3" max="150" required>
                                        </div>
                                        <label for="dance_type">Направление</label>
                                        <br>
                                        <select required name="dance_type" style="width: 50%">
                                            @foreach($dance_types as $el)
                                                <option value="{{$el->dance_type_id}}">{{$el->title}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="name">Уровень</label>
                                        <br>
                                        <select required name="level" style="width: 50%">
                                            @foreach($levels as $el)
                                                <option value="{{$el->level_id}}">{{$el->level_name}}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <br>

                                        <div class="form-group">
                                            <label for="benefits">Количество уроков</label>
                                            <input type="number" class="form-control" id="email"
                                                   name="count" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Цена</label>
                                            <input type="number" class="form-control" id="email"
                                                   name="price" required>
                                        </div>
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
