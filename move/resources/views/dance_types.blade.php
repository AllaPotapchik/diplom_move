@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/dance_types.css'])
    <div style="margin-top: 6rem" class="container card_wrap" >
        @foreach($dance_type as $el)
            @if($el->title=='ХИП-ХОП')
                <div class="dance_type_card" style="background: #BA80E6">
                    <div class="card_info">
                        <div class="card_text">
                            <h1 class="dance_type_name">{{$el->title}}</h1>
                            <p class="dance_type_description">{{$el->short}}</p>
                            <a href="{{route('singleType', $el->dance_type_id)}}">
                                <button class="text-dark">Узнать больше</button>
                            </a>
                        </div>
                        <img src="{{asset('/images/hip_hop.png')}}">
                    </div>
                </div>
            @elseif($el->title=='ДЖАЗ-ФАНК')
                <div class="dance_type_card" style="background: #92ABFC">
                    <div class="card_info">
                        <div class="card_text">
                            <h1 class="dance_type_name">{{$el->title}}</h1>
                            <p class="dance_type_description">{{$el->short}}</p>
                            <a href="{{route('singleType', $el->dance_type_id)}}">
                                <button class="text-dark">Узнать больше</button>
                            </a>
                        </div>
                        <img style="margin-right: 8rem" src="{{asset('/images/juzz_funk.png')}}">
                    </div>
                </div>
            @elseif($el->title=='ВОГ')
                <div class="dance_type_card" style="background: #FFAF77">
                    <div class="card_info">
                        <div class="card_text">
                            <h1 class="dance_type_name">{{$el->title}}</h1>
                            <p class="dance_type_description">{{$el->short}}</p>
                            <a href="{{route('singleType', $el->dance_type_id)}}">
                                <button class="text-dark">Узнать больше</button>
                            </a>
                        </div>
                        <img style="margin-right: 8rem" src="{{asset('/images/vogue.png')}}">
                    </div>
                </div>
            @elseif($el->title=='ТВЕРК')
                <div class="dance_type_card" style="background: #FF77B8">
                    <div class="card_info">
                        <div class="card_text">
                            <h1 class="dance_type_name">{{$el->title}}</h1>
                            <p class="dance_type_description">{{$el->short}}</p>
                            <a href="{{route('singleType', $el->dance_type_id)}}">
                                <button class="text-dark">Узнать больше</button>
                            </a>
                        </div>
                        <img src="{{asset('/images/twerk.png')}}">
                    </div>
                </div>
            @endif
        @endforeach

    </div>
@endsection
