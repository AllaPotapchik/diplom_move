@extends('layouts.admin_panel')
@section('title', 'Изменить направление')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить направление</h1>
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
                            <form method="post" action="{{route('user_admin.update', $user->id )}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="benefits">Имя</label>
                                            <input type="text" value="{{$user->name}}" class="form-control"  id="name"
                                                   name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Email</label>
                                            <input type="email" value="{{$user->email}}" class="form-control"  id="email"
                                                   name="email" required>
                                        </div>
{{--                                        <div class="form-group">--}}
{{--                                            <label for="benefits">Пароль</label>--}}
{{--                                            <input type="password" class="form-control"  id="password"--}}
{{--                                                   name="password" required>--}}
{{--                                        </div>--}}
                                        <div class="form-group">
                                            <label for="benefits">Телефон</label>
                                            <input type="tel" value="{{$user->phone}}" class="form-control"  id="phone"
                                                   name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Баланс</label>
                                            <input type="tel" value="{{$user->point_balance}}" class="form-control"  id="phone"
                                                   name="balance" required>
                                        </div>
                                        <label for="name">Тип пользователя</label>
                                        <br>
                                        <select required name="user_type">
                                            @foreach($user_types as $el)
                                                <option value="{{$el->type_id}}">{{$el->type_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <!-- /.card-body -->

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
