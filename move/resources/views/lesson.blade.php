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
					<?php


					$lesson_status = Illuminate\Support\Facades\DB ::table( 'user_lessons' ) -> where( 'user_id', Illuminate\Support\Facades\Auth ::id() )
					                                               -> where( 'lesson_id', $el -> lesson_id )
                                                                   -> first();
					?>
                @if(!$lesson_status)
                    <p>Не пройден</p>
                    <a href="{{route('startLesson', [$el->lesson_id, $program->program_id])}}">
                        <button  class="text-dark">Пройти урок</button>
                    </a>
                @elseif($lesson_status->status == 0)
                    <p>Не пройден</p>
                    <a href="{{route('startLesson', [$el->lesson_id, $program->program_id])}}">
                        <button  class="text-dark">Пройти урок</button>
                    </a>
                @elseif($lesson_status->status == 1)
                    <p>Пройден</p>
                    <a href="{{route('startLesson', [$el->lesson_id, $program->program_id])}}">
                        <button disabled class="text-dark">Пройти урок</button>
                    </a>
                @endif

            </div>
        @endforeach



    </div>
@endsection
