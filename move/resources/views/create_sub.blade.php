@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css'])
    <div class="container back_color">
        @if (session('success'))
            <div class="alert alert-success">
                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-success">
                <h6><i class="icon fa fa-check"></i> {{ session('error') }}</h6>
                <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×</button>
            </div>
        @endif
        <form method="post" action="{{route('createSubscription')}}">
            @csrf
            <h1>
                Выберите направление
            </h1>
            @foreach($dance_types as $el)
                <label>
                    <input required type="radio" name="dance_type" value="{{$el->dance_type_id}}">{{$el->title}}
                </label>
            @endforeach

            <h1>
                Выберите уровень
            </h1>
            @foreach($levels as $el)
                <label>
                    <input required type="radio" name="level_id" value="{{$el->level_id}}">{{$el->level_name}}
                </label>
            @endforeach
            <h1>
                Подтвердите данные
            </h1>
            <input type="text" value="{{$user->name}}" name="user_name">
            <input type="text" value="{{$user->email}}" name="user_email">
            <input type="text" value="{{$user->phone}}" name="user_phone">
            <input type="hidden" value="{{$id}}" name="sub_id">
            <a>
                <button type="submit" class="text-dark">Подтвердить</button>
            </a>
        </form>


    </div>
@endsection
