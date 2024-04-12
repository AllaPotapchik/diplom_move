@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css'])
    <div class="container back_color">
        <div class="schedule_table">
            <div class="schedule_day">Понедельник</div>
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
                                        <button  class="schedule_btn">Записаться</button>
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
        </div>

        <div class="schedule_day">Вторник</div>
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
                        <?php if ( Auth ::check() )
                    {
                        ?>
                    <td>
                        <a href="{{route('createRecord', [$el->id])}}">
                            <button class="schedule_btn">Записаться</button>
                        </a>
                    </td>
                    <?php } else{ ?>
                    <td class="not_authorized">
                        Для записи необходимо авторизировться
                    </td>
                    <?php } ?>

                </tr>
                <p></p>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
