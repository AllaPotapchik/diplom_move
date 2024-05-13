@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/account.css', 'resources/js/account.js', 'resources/css/order.css'])
    <div style="margin-top: 6rem" class="container back_color">
        <div class="user_head">
            <p>
                {{$user->name}}, добро пожаловать в личный кабинет
            </p>
            @if($show_balance)
                <p class="balance">Баллы: {{$user->point_balance}}</p>
            @endif
        </div>
        <div class="user_buttons">
            <div class="personal_buttons">
                <button id="lesson_btn">
                    Мои тренировки
                </button>
                <button id="program_btn">
                    Мои программы
                </button>
                <button id="subscription_btn">
                    Мои абонементы
                </button>
                <button id="update_btn">
                    Редактировать профиль
                </button>
            </div>
            <div class="exit_button">
                <button><a class="nav-link text-dark "
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Выход') }}
                    </a>
                </button>
            </div>
        </div>
        <br>
        <div class="my_lessons">
            <div class="scroll">
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
                            <th></th>
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
                                <td>
                                    <a href="{{route('deleteRecord', [$el->record_id, $el->schedule_id])}}">
                                        <button class="schedule_btn button violet">Отменить</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                    </table>
                @endif
            </div>
        </div>
        <div class="my_programs">
            @if(sizeof($user_programs) == 0 )
                <div class="no_lessons">У вас еще нет программ</div>
            @else
                @foreach($user_programs as $el)
                    <div class="program_card">
                        <p class="program_title mb-4">{{$el->program_name}}</p>
                        @if($el->is_check == 0)
                            <a href="{{route('showLessons', $el->program_id)}}">  <button disabled class="text-dark size disabled">Перейти к урокам</button>
                            </a>
                            <h6 class="footnote">*Уроки будут доступны после подтверждения администратора</h6>
                        @else
                            <a href="{{route('showLessons', $el->program_id)}}">
                            <button class="text-dark size">Перейти к урокам</button>
                        </a>
                        @endif

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
            <div class="user_info">
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
                    <button class="mt-2 button violet" type="submit">Изменить</button>
                </form>
                <br><br>
                <form class="update_profile" method="post" action="{{route('changePassword')}}">
                    @csrf
                    <h3>Для смены пароля введите старый</h3>
                    <label for="user_password">Старый пароль</label>
                    <input type="password" name="old_user_password">
                    <label for="user_password">Новый пароль</label>
                    <input type="password" name="new_user_password">
                    <button class="mt-2 button violet">Сменить пароль</button>
                </form>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection
