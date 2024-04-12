@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css'])
    <div class="container back_color">
        <form method="post" action="{{route('createSubscription')}}">
            @csrf
            <h1>
                Выберите направление
            </h1>
            @foreach($dance_types as $el)
                <label>
                    <input type="radio" name="dance_type" value="{{$el->dance_type_id}}">{{$el->title}}
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
                <button type="submit">">Подтвердить</button>
            </a>
        </form>


    </div>
@endsection
