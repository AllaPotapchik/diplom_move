@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/subscription.css'])
    <div style="margin-top: 6rem" class="container card_wrap">
        @foreach($subscription as $el)
          <div class="subscription_card">
              <p class="subscription_name">{{$el->subscription_name}}</p>
              <p class="subscription_desc">{{$el->description}}</p>
              <p class="subscription_price">{{$el->subscription_price}} BYN</p>
              @if(Auth::check())
                  <a href="{{route('getSubscription',[$el->id])}}"><button>Купить</button></a>
              @else
                  <a href="/login"><button>Купить</button></a>
              @endif
          </div>
        @endforeach

    </div>
@endsection
