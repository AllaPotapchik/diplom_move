@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/lesson.css', 'resources/css/account.css'])
    <div style="margin-top: 6rem" class="container program_card">
        <p class="program_title">{{$program->program_name}}</p>
        @foreach($lessons as $el)
            <div class="lesson_card">
                <p>Урок {{$el->number}}. {{$el->lesson_name}}</p>
					<?php
					$lesson_status = Illuminate\Support\Facades\DB ::table( 'user_lessons' )
                                                                   -> where( 'user_id', Illuminate\Support\Facades\Auth ::id())
					                                               -> where( 'lesson_id', $el -> lesson_id )
                                                                   -> first();
					?>
                @if(!$lesson_status)
                    <p>Не пройден</p>
                    <a href="{{route('startLesson', [$el->lesson_id, $program->program_id])}}">
                        <button>Пройти урок</button>
                    </a>
                @elseif($lesson_status->status == 0)
                    <p>Не пройден</p>
                    <a href="{{route('startLesson', [$el->lesson_id, $program->program_id])}}">
                        <button>Пройти урок</button>
                    </a>
                @elseif($lesson_status->status == 1)
                    <p>Пройден</p>
                @if($lesson_status->teacher_comment != "" )
                    <div>Комментарий от преподавателя: {{$lesson_status->teacher_comment}}</div>
                    @endif

                @endif
            </div>
        @endforeach
    </div>
@endsection
