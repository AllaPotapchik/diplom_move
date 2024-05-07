@extends('layouts.app')
@section('title')
    Проверка урока
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/lesson.css', 'resources/css/account.css', 'resources/css/order.css'])
    <div style="margin-top: 6rem" class="container back_color">
        <p class="order_header">Проверка задания</p>
        <video controls>
            <source src="{{asset('storage')}}/videos/{{$task->user_video}}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <form class="check" method="post" action="{{route('checkTask')}}" >
            @csrf
            <input type="text" class="teacher_comment" placeholder="Комментарий к заданию" name="teacher_comment">
            <input type="hidden" value="{{$task->lesson_id}}" name="lesson_id">
            <input type="hidden" value="{{$task->user_id}}" name="user_id">
            @foreach($points as $el)
                <div class="radio_button_points">
                    <input required id="point_id-{{$el->point_id}}" type="radio" name="point_id"
                           value="{{$el->point_id}}">
                    <label for="point_id-{{$el->point_id}}"> {{$el->point_name}} </label>
                </div>
{{--                <label>--}}
{{--                    <input type="radio" name="point_id" value="{{$el->point_id}}">{{$el->point_name}}--}}
{{--                </label>--}}
            @endforeach
            <button type="submit" class="text-white">Проверить</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @elseif(session('error'))
            <div class="alert alert-success">
                <p>{{session('error')}}</p>
            </div>
            <br/>
        @endif
    </div>
@endsection
