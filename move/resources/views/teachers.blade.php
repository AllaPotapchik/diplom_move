@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/subscription.css'])
    <div class="container card_wrap">
        @foreach($teachers as $el)
            <a href="{{route('showTeacher', $el->teacher_id)}}">
                <div class="subscription_card teacher">
                    <img style="height: 240px;" src="{{asset('storage')}}/teachers_photo/{{$el->photo_path}}">
                    <p class="dance_type">{{$el->title}}</p>
                    <p class="name">{{$el->teacher_name}}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
