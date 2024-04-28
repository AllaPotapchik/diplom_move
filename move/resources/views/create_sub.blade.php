@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css','resources/css/order.css', 'resources/js/pay.js'])
    <div class="container back_color">
        @if (session('success'))
            <div class="alert alert-success">
                <h6><i class="icon fa fa-check"></i> {{ session('success') }}</h6>
                <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×
                </button>
            </div>
        @elseif(session('error'))
            <div class="alert alert-success">
                <h6><i class="icon fa fa-check"></i> {{ session('error') }}</h6>
                <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×
                </button>
            </div>
        @endif
        <div class="wrapper">
            <div class="back">
                <a id="back_btn" >Вернуться</a>
            </div>
            <form method="post" action="{{route('createSubscription')}}">
                @csrf
                <div class="order_info">
                    <h1>
                        Выберите направление
                    </h1>
                    @foreach($dance_types as $el)
                        <label>
                            <input required type="radio" name="dance_type" value="{{$el->dance_type_id}}">{{$el->title}}
                        </label>
                    @endforeach

                    <h1>
                        Выберите уровень
                    </h1>
                    @foreach($levels as $el)
                        <label>
                            <input required type="radio" name="level_id" value="{{$el->level_id}}">{{$el->level_name}}
                        </label>
                    @endforeach
                    <h1>
                        Подтвердите данные
                    </h1>
                    <input type="text" value="{{$user->name}}" name="user_name">
                    <input type="text" value="{{$user->email}}" name="user_email">
                    <input type="text" value="{{$user->phone}}" name="user_phone">
                    <input type="hidden" value="{{$id}}" name="sub_id">

                    <a class="text-dark" id="confirm_btn">Подтвердить</a>
                </div>

                <div class="pay_info">
                    <div>
                        <p>Ваш балланс: <span id="point_balance">{{$user->point_balance}}</span> баллов<br>
                        <p>Ваш балланс позволяет оплатить <span id="percent">{{$percent}}</span>% от стоимости абонемента
                        </p>
                        @if($percent == 0)
                            <button id="points_btn" disabled value="{{$cost}}" class="text-dark disabled">Использовать баллы</button>
                        @else
                            <span id="sub_id" class="d-none">{{$id}}</span>
                            <button id="points_btn" value="{{$cost}}" class="text-dark">Использовать баллы</button>
                        @endif
                        <div id="price">Сумма к оплате: <span id="price">{{$subscription->subscription_price}} BYN</span></div>
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
                    <button type="submit" class="text-dark">Оплатить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
