@extends('layouts.admin_panel')
@section('title', 'Добавить пользователя')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить пользователя</h1>
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

                            <form method="post" action="{{route('user_admin.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="benefits">Имя</label>
                                            <input type="text" class="form-control" id="name"
                                                   name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                   name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Пароль</label>
                                            <input type="password" class="form-control" id="password"
                                                   name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Телефон</label>
                                            <input type="tel" class="form-control" id="phone"
                                                   name="phone" required>
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
