@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/tariff.css','resources/css/program.css', 'resources/js/faq.js'])

    <div style="margin-top: 6rem" class="container">
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

        @foreach($programs as $el)
            <div class="tariff_card element-animation">
                <p class="tariff_title  mb-4">{{$el->program_name}}</p>
					<?php
					$lessons = DB ::table( 'lessons' )
					              -> where( 'program_id', $el -> program_id )
					              -> select( '*' )
					              -> get(); ?>
                @foreach($lessons as $lesson)
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3>Урок {{$lesson->number}}: {{$lesson->lesson_name}} </h3>
                            <span class="faq-toggle">+</span>
                            <p class="faq-answer">{{$lesson->lesson_description}}</p>
                        </div>
                    </div>
                    <br>
                @endforeach
                <br>
                @if ( Auth ::check() )
                    <a
                            href="{{route('showDetails',[$el->dance_type_id, $tariff_id,$el-> program_id])}}"><button disabled class="program_btn button white">Купить
                    </button></a>
                @else
                  <a href="/login">  <button disabled class="program_btn disabled">Купить</button></a>
                @endif
            </div>
        @endforeach
    </div>
@endsection
