@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/dance_types.css'])
    <div class="container card_wrap">
        @foreach($dance_type as $el)

            @if($el->title=='ХИП-ХОП')
                <div class="dance_type_card" style="background: #BA80E6">
                    <div class="card_info">
                        <div class="card_text">
                            <h1 class="dance_type_name">{{$el->title}}</h1>
                            <p class="dance_type_description">{{$el->short}}</p>
                            <button class="text-dark">Узнать больше</button>
                        </div>
                        <img src="{{asset('/images/hip_hop.png')}}">
                    </div>


                </div>
            @elseif($el->title=='ДЖАЗ-ФАНК')
                <div class="dance_type_card" style="background: #92ABFC">
                    <p class="dance_type_name">{{$el->title}}</p>

                </div>
            @elseif($el->title=='VOGUE')
                <div class="dance_type_card" style="background: #FFAF77">
                    <p class="dance_type_name">{{$el->title}}</p>

                </div>
            @elseif($el->title=='TWERK')
                <div class="dance_type_card" style="background: #FF77B8">
                    <p class="dance_type_name">{{$el->title}}</p>

                </div>
            @endif
            {{--                <p class="subscription_desc">{{$el->description}}</p>--}}
            {{--                <p class="subscription_price">{{$el->subscription_price}} BYN</p>--}}
            {{--                @if(Auth::check())--}}
            {{--                    <a href="{{route('getSubscription',[$el->id])}}"><button>Купить</button></a>--}}
            {{--                @else--}}
            {{--                    <a href="/login"><button>Купить</button></a>--}}
            {{--                @endif--}}
        @endforeach

    </div>
@endsection
