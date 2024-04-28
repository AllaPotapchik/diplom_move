@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/account.css', 'resources/js/teacher.js'])
    <div class="container back_color">
{{--        @dd($user);--}}
        <h1>Преподаватель {{$user->name}}</h1>
        <button id="lesson_btn" class="text-dark">Мое расписание</button>
        <button id="tasks_btn" class="text-dark">Задания</button>
        <button><a class="nav-link text-dark "
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Выход
            </a></button>
        <br>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="teacher_lessons">
            <br>
            @if(sizeof($teacher_lessons) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>День недели</th>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Уровень</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teacher_lessons as $el)
                        <tr>
                            <td>{{$el->day_name}} </td>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->level_name}} </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            @endif
        </div>
        <br>
        <div class="user_tasks">
            @if(sizeof($user_tasks) == 0 )
                <div class="no_lessons">нет заданий</div>
            @else
                @foreach($user_tasks as $el)
                    <div class="program_card">
                        <p>Урок: {{$el->lesson_name}}</p>
                        <p>Ученик: {{$el->name}}</p>
                        <a href="{{route('showTask',[$el->lesson_id, $el->user_id])}} ">
                            <button class="text-dark size">Просмотреть</button>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

