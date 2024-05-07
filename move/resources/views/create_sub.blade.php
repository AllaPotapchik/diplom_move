@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css','resources/css/order.css', 'resources/js/pay.js'])
    <div style="margin-top: 6rem" class="container back_color">
        @if (session('success'))
            <div class="alert alert-success">
                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×
                </button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                <h6><i class="icon fa fa-check"></i> {{ session('error') }}</h6>
                <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×
                </button>
            </div>
        @endif
        <div class="wrapper">
            <div class="back">
            </div>
            <form method="post" action="{{route('createSubscription')}}">
                @csrf
                <div class="order_info">
                    @if($dance_type_id == 0)
                        <p style="margin-top: 0" class="order_header">
                            Выберите направление
                        </p>
                        <div class="radio_wrap">
                            @foreach($dance_types as $el)
                                <div class="radio_button_type">
                                    <input required id="type-{{$el->dance_type_id}}" type="radio" name="dance_type"
                                           value="{{$el->dance_type_id}}">
                                    <label for="type-{{$el->dance_type_id}}"> {{$el->title}} </label>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <input  type="hidden" name="dance_type" value="{{$dance_type_id}}">
                    @endif
                    <p class="order_header">
                        Выберите уровень
                    </p>
                    <div class="radio_wrap">
                    @foreach($levels as $el)
                        <div class="radio_button_level">
                            <input required id="level-{{$el->level_id}}" type="radio" name="level_id"
                                   value="{{$el->level_id}}">
                            <label for="level-{{$el->level_id}}"> {{$el->level_name}} </label>
                        </div>
                    @endforeach
                    </div>
                    <p class="order_header">
                        Персональные данные
                    </p>
                    <div class="user_info">
                        <input type="text" value="{{$user->name}}" name="user_name">
                        <input type="text" value="{{$user->email}}" name="user_email">
                        <input type="text" value="{{$user->phone}}" name="user_phone">
                        <input type="hidden" value="{{$id}}" name="sub_id">
                    </div>
                    <br>

                    <button><a id="confirm_btn" type="button" style="cursor: pointer; color: #ffffff">Далее</a></button>
                    <br>
                    <br>
                </div>

                <div class="pay_info">
                    <p class="order_header">Оплата</p>
                    <div>
                        <p>Ваш балланс: <span id="point_balance">{{$user->point_balance}}</span> баллов<br>
                        <div id="hide">
                        <p>Ваш балланс позволяет оплатить <span id="percent">{{$percent}}</span>% от стоимости
                            абонемента
                        </p>
                        @if($percent == 0)
                            <button id="points_btn" disabled value="{{$cost}}" class="disabled">Использовать
                                баллы
                            </button>
                        @else
                            <span id="sub_id" class="d-none">{{$id}}</span>
                            <a><button type="button" id="points_btn" value="{{$cost}}" class="pay">Использовать баллы</button></a>
                        @endif

                        <br>
                        <br>
                        </div>
                        <div class="order_header" id="price">Сумма к оплате: <span
                                id="price">{{$subscription->subscription_price}} BYN</span></div>
                    </div>
                    <div class="card_info">
                        <label for="cardNumber">Номер карты:</label>
                        <input type="text" id="cardNumber" name="cardNumber" placeholder="Введите номер карты" required>

                        <label for="cardName">Имя владельца:</label>
                        <input type="text" id="cardName" name="cardName" placeholder="Введите имя владельца" required>

                        <label for="expiryDate">Срок действия:</label>
                        <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>

                        <label for="cvv">CVV:</label>
                        <input type="password" id="cvv" maxlength="3" name="cvv" placeholder="Введите CVV" required>
                    </div>
                    <button class="pay" type="submit">Оплатить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
