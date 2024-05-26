@extends('layouts.admin_panel')
@section('title', 'Изменить пользователя')

@section('content')

        <div class="content-wrapper" style="background-color: rgb(248, 242, 252)">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Изменить пользователя</h1>
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
                            <form method="post" action="{{route('user_admin.update', $user->id )}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="benefits">Имя</label>
                                            <input type="text" value="{{$user->name}}" class="form-control"  id="name"
                                                   name="name" min="3" max="30" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Email</label>
                                            <input type="email" value="{{$user->email}}" class="form-control"  id="email"
                                                   name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="benefits">Пароль</label>
                                            <input type="password" class="form-control"  id="password"
                                                   name="password" min="8" required>
                                        </div>
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
                                        <select required name="user_type" style="width: 50%">
                                            @foreach($user_types as $el)
                                                <option value="{{$el->type_id}}">{{$el->type_name}}</option>
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
