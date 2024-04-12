@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/tariff.css','resources/css/program.css', 'resources/js/faq.js'])

    <div class="container">


                @foreach($programs as $el)
                    <div class="tariff_card">
                        <p class="tariff_title  mb-4">{{$el->program_name}}</p>
                                <?php
                                $lessons = DB ::table( 'lessons' )
                                              -> where( 'program_id', $el    -> program_id )
                                              -> select( '*' )
                                              -> get(); ?>
                            @foreach($lessons as $lesson)
                            <div class="faq-item">
                                <div class="faq-question">
                                    <h3 >Урок {{$lesson->number}}: {{$lesson->lesson_name}} </h3>
                                    <span class="faq-toggle">+</span>
                                    <p class="faq-answer">{{$lesson->lesson_description}}</p>

                                </div>

                            </div>

                                <br>
                            @endforeach


                        <br>
                        @if ( Auth ::check() )
                            <button disabled class="program_btn"><a href="{{route('createProgramRecord',[$el->dance_type_id, $tariff_id])}}">Купить</a></button>
                        @else

                                <button disabled class="program_btn disabled"><a href="/login">Купить </a></button>

                        @endif

                    </div>
                @endforeach

    </div>
@endsection
