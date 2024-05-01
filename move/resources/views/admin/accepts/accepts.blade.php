@extends('layouts.admin_panel')
@section('title', 'Заявки')
@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Заявки</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                            </div>
                        @endif
                        <div class="card card-primary">
                                @if(sizeof($records) == 0)
                                    <div class="m-3">Нет заявок</div>
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Пользователь</th>
                                            <th scope="col">Тариф</th>
                                            <th scope="col">Программа</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($records as $el)

                                            <tr>
                                                <th scope="row">{{$el->name}}</th>
                                                <td>{{$el->tariff_name}}</td>
                                                <td>{{$el->program_name}}</td>
                                                {{--                                            <td>{{$el->type_benefits}}</td>--}}
                                                <td class="text-center d-flex justify-content-center">
                                                    <form method="get" action="{{route('accept', $el->users_tariff_id)}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger rounded-pill px-3 delete_btn">Подтвердить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
        </section>
    </div>
@endsection

