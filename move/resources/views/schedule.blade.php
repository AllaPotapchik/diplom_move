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
                <?php $schedule_monday = DB ::table( 'schedule' )
                                            -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                            -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                            -> join( 'dance_types', 'schedule.dance_type_id', '=', 'dance_types.dance_type_id' )
                                            -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                            -> where( 'days_of_week.name', 'Понедельник' )
                                            -> select( '*' )
                                            -> get(); ?>
                @foreach($schedule_monday as $el)
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
                            <button class="schedule_btn" id="{{$el->id}}">Записаться</button>
                        </td>
                        <?php } else{?>
                        <td class="not_authorized">
                            Для записи необходимо авторизировться
                        </td>
                        <?php }?>

                    </tr>
                    <p></p>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="schedule_day">Вторник</div>
        <?php $schedule_tuesday = DB ::table( 'schedule' )
                                     -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                     -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                     -> where( 'days_of_week.name', 'Вторник' )
                                     -> select( 'days_of_week.name' )
                                     -> get(); ?>
        @foreach($schedule_tuesday as $el)

        @endforeach
    </div>
@endsection
