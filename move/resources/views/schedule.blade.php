@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css'])
    <div class="container back_color">
        <div class="schedule_table">
{{--             {{var_dump($newDate)}}--}}
            <div class="schedule_day">Понедельник</div>
            @if(sizeof($scheduleMonday) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Преподаватель</th>
                        <th>Уровень</th>
                        <th>Места</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($scheduleMonday as $el)
                        <tr>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->teacher_name}} </td>
                            <td>{{$el->level_name}} </td>
                            <td>{{$el->available_count}} </td>
                            @if ( Auth ::check() )
                                <td>
                                    @if($el->available_count == 0)
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button disabled class="schedule_btn disabled">Записаться</button>
                                        </a>
                                    @else
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button class="schedule_btn">Записаться</button>
                                        </a>
                                    @endif
                                </td>
                            @else
                                <td class="not_authorized">
                                    Для записи необходимо выбрать тариф
                                </td>
                            @endif

                        </tr>
                        <p></p>
                    @endforeach
                    </tbody>
                </table>
            @endif



        <div class="schedule_day">Вторник</div>
            @if(sizeof($scheduleMonday) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Преподаватель</th>
                        <th>Уровень</th>
                        <th>Места</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($scheduleTuesday as $el)
                        <tr>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->teacher_name}} </td>
                            <td>{{$el->level_name}} </td>
                            <td>{{$el->available_count}} </td>
                            @if ( Auth ::check() )
                                <td>
                                    @if($el->available_count == 0)
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button disabled class="schedule_btn disabled">Записаться</button>
                                        </a>
                                    @else
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button class="schedule_btn">Записаться</button>
                                        </a>
                                    @endif
                                </td>
                            @else
                                <td class="not_authorized">
                                    Для записи необходимо авторизировться
                                </td>
                            @endif

                        </tr>
                        <p></p>
                    @endforeach
                    </tbody>
                </table>
            @endif

    <div class="schedule_day">Среда</div>
            @if(sizeof($scheduleWednesday) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Преподаватель</th>
                        <th>Уровень</th>
                        <th>Места</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($scheduleMonday as $el)
                        <tr>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->teacher_name}} </td>
                            <td>{{$el->level_name}} </td>
                            <td>{{$el->available_count}} </td>
                            @if ( Auth ::check() )
                                <td>
                                    @if($el->available_count == 0)
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button disabled class="schedule_btn disabled">Записаться</button>
                                        </a>
                                    @else
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button class="schedule_btn">Записаться</button>
                                        </a>
                                    @endif
                                </td>
                            @else
                                <td class="not_authorized">
                                    Для записи необходимо авторизировться
                                </td>
                            @endif

                        </tr>
                        <p></p>
                    @endforeach
                    </tbody>
                </table>
            @endif

            <div class="schedule_day">Четверг</div>
            @if(sizeof($scheduleThursday) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Преподаватель</th>
                        <th>Уровень</th>
                        <th>Места</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($scheduleMonday as $el)
                        <tr>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->teacher_name}} </td>
                            <td>{{$el->level_name}} </td>
                            <td>{{$el->available_count}} </td>
                            @if ( Auth ::check() )
                                <td>
                                    @if($el->available_count == 0)
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button disabled class="schedule_btn disabled">Записаться</button>
                                        </a>
                                    @else
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button class="schedule_btn">Записаться</button>
                                        </a>
                                    @endif
                                </td>
                            @else
                                <td class="not_authorized">
                                    Для записи необходимо авторизировться
                                </td>
                            @endif

                        </tr>
                        <p></p>
                    @endforeach
                    </tbody>
                </table>
            @endif

            <div class="schedule_day">Пятница</div>
            @if(sizeof($scheduleFriday) == 0 )
                <div class="no_lessons">нет тренировок по вашим направленям</div>
            @else
                <table>
                    <thead>
                    <tr>
                        <th>Время</th>
                        <th>Направление</th>
                        <th>Преподаватель</th>
                        <th>Уровень</th>
                        <th>Места</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($scheduleMonday as $el)
                        <tr>
                            <td><?php echo date( 'H:i', strtotime( $el -> time ) ); ?> </td>
                            <td>{{$el->title}} </td>
                            <td>{{$el->teacher_name}} </td>
                            <td>{{$el->level_name}} </td>
                            <td>{{$el->available_count}} </td>
                            @if ( Auth ::check() )
                                <td>
                                    @if($el->available_count == 0)
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button disabled class="schedule_btn disabled">Записаться</button>
                                        </a>
                                    @else
                                        <a href="{{route('createRecord', [$el->id])}}">
                                            <button class="schedule_btn">Записаться</button>
                                        </a>
                                    @endif
                                </td>
                            @else
                                <td class="not_authorized">
                                    Для записи необходимо авторизировться
                                </td>
                            @endif

                        </tr>
                        <p></p>
                    @endforeach
                    </tbody>
                </table>
            @endif
    </div>

@endsection
