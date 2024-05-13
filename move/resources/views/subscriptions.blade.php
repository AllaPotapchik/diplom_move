@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/subscription.css'])
    <div style="margin-top: 6rem" class="container card_wrap">
        @foreach($subscription as $el)
          <div class="subscription_card element-animation">
              <p class="subscription_name">{{$el->subscription_name}}</p>
              <p class="subscription_desc">{{$el->description}}</p>
              <p class="subscription_price">{{$el->subscription_price}} BYN</p>
              @if(Auth::check())
                  <a href="{{route('getSubscription',[$el->id, $dance_type_id])}}" ><button type="button" class="button blue">Купить</button></a>
              @else
                  <a href="/login"><button class="button blue">Купить</button></a>
              @endif
          </div>
        @endforeach

    </div>
@endsection
