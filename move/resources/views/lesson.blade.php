@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/lesson.css', 'resources/css/account.css'])
    <div class="container back_color">

    <p class="program_title">{{$program->program_name}}</p>
    @foreach($lessons as $el)
            <div class="lesson_card">
{{--                {{var_dump($lesson_array)}}--}}
{{--                {{var_dump($status)}}--}}
        <p>Урок {{$el->number}}. {{$el->lesson_name}}</p>
                @if($el->lesson_status == 0)
                    <p>Не пройден</p>
                @else
                    <p>Пройден</p>
                @endif
       <a href="{{route('startLesson', [$el->lesson_id, $program->program_id])}}">
           <button class="text-dark">Пройти урок</button>
       </a>
            </div>
    @endforeach



    </div>
@endsection
