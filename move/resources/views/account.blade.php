@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/account.css', 'resources/js/account.js'])
    <div class="container back_color">
        <div class="user_head">
            <h2>
                {{$user->name}}, добро пожаловать в личный кабинет
            </h2>
            <h2>Баллы: {{$user->point_balance}}</h2>
        </div>
        <button id="lesson_btn" class="text-dark">
            Мои тренировки
        </button>

        <button id="program_btn" class="text-dark ">
            Мои программы
        </button>
        <button id="subscription_btn" class="text-dark ">
            Мои абонементы
        </button>
        <button id="update_btn" class="text-dark ">
            Редактировать профиль
        </button>
        <button><a class="nav-link text-dark "
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Выход') }}
            </a>
        </button>
        <br>
        <br>
        <div class="my_lessons">
            {{--            {{var_dump($user_orders)}}--}}
            @if(sizeof($user_orders) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Преподаватель</th>
                        <th>Уровень</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($user_orders as $el)
                        <tr>
                            <td><?php echo date( 'd/m', strtotime( $el -> date ) ); ?> </td>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->teacher_name}} </td>
                            <td>{{$el->level_name}} </td>
                            {{--                <td>{{$el->available_count}} </td>--}}
                        </tr>
                    </tbody>

                    @endforeach
                </table>
            @endif

        </div>
        <div class="my_programs">
            @if(sizeof($user_programs) == 0 )
                <div class="no_lessons">У вас еще нет программ</div>
            @else
                @foreach($user_programs as $el)
                    <div class="program_card">
                        <p class="program_title mb-4">{{$el->program_name}}</p>
                        <a href="{{route('showLessons', $el->program_id)}}">
                            <button class="text-dark size">Перейти к урокам</button>
                        </a>
                    </div>

                @endforeach
            @endif
        </div>
        <div class="my_subscriptions">
            @if(sizeof($user_subscriptions) == 0 )
                <div class="no_lessons">У вас нет абонемента</div>
            @else
                @foreach($user_subscriptions as $el)
                    <div class="program_card">
                        <p class="subscription_name">Абонемент на {{$el->subscription_name}}</p>
                        <p>Осталось занятий: {{$el->available_count}}</p>
                        <p>Направление: {{$el->title}}</p>
                        <p>Уровень: {{$el->level_name}}</p>
                    </div>

                @endforeach
            @endif
        </div>
        <div class="edit_profile">
            @if(session('success'))
                <div class="alert alert-success">
                    <p>{{session('success')}}</p>
                </div>
                <br/>
            @endif
            <form class="update_profile" action="{{route('updateProfile', $user->id)}}" method="get">
                @csrf
                <label for="user_name">Имя</label>
                <input value="{{$user->name}}" name="user_name">
                <label for="user_phone">Телефон</label>
                <input id="phone" type="tel" name="user_phone" value="{{$user->phone}}">
                <label for="user_email">Email</label>
                <input value="{{$user->email}}" name="user_email">
                <button class="text-dark mt-2" type="submit">Изменить</button>
            </form>
<br>
            <form class="update_profile" method="post" action="{{route('changePassword')}}">
                @csrf

                <h3>Для смены пароля введите старый</h3>
                <label for="user_password">Старый пароль</label>
                <input type="password" name="old_user_password">
                <label for="user_password">Новый пароль</label>
                <input type="password" name="new_user_password">
                <button class="text-dark mt-2">Сменить пароль</button>
            </form>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
@endsection
