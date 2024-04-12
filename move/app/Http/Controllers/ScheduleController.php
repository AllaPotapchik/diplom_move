<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Users_tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller {
    public function index() {
        if ( ! Auth ::check() ) {
            $scheduleMonday = DB ::table( 'schedule' )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> where( 'days_of_week.name', 'Понедельник' )
                                 -> select( '*' )
                                 -> get();

            $scheduleTuesday = DB ::table( 'schedule' )
                                  -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                  -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                  -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                  -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                  -> where( 'days_of_week.name', 'Вторник' )
                                  -> select( '*' )
                                  -> get();

            $scheduleWednesday = DB ::table( 'schedule' )
                                    -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                    -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                    -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                    -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                    -> where( 'days_of_week.name', 'Среда' )
                                    -> select( '*' )
                                    -> get();

            $scheduleThursday = DB ::table( 'schedule' )
                                   -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                   -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                   -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                   -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                   -> where( 'days_of_week.name', 'Четверг' )
                                   -> select( '*' )
                                   -> get();

            $scheduleFriday = DB ::table( 'schedule' )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> where( 'days_of_week.name', 'Пятница' )
                                 -> select( '*' )
                                 -> get();
        } else {
            $user_id         = Auth ::id();
            $user_dance_type = DB ::table( 'users_tariffs' )
                                  -> where( 'user_id', $user_id )
                                  -> select( 'dance_type' )
                                  -> get();
            foreach ( $user_dance_type as $value ) {
                $dataArray[] = $value -> dance_type;
            }
            $scheduleMonday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $dataArray )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> where( 'days_of_week.name', 'Понедельник' )
                                 -> select( '*' )
                                 -> get();

            $scheduleTuesday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $dataArray )
                                  -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                  -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                  -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                  -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                  -> where( 'days_of_week.name', 'Вторник' )
                                  -> select( '*' )
                                  -> get();

            $scheduleWednesday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $dataArray )
                                    -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                    -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                    -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                    -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                    -> where( 'days_of_week.name', 'Среда' )
                                    -> select( '*' )
                                    -> get();

            $scheduleThursday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $dataArray )
                                   -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                   -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                   -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                   -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                   -> where( 'days_of_week.name', 'Четверг' )
                                   -> select( '*' )
                                   -> get();

            $scheduleFriday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $dataArray )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> where( 'days_of_week.name', 'Пятница' )
                                 -> select( '*' )
                                 -> get();
        }


        return view( 'schedule', [
            'scheduleMonday'    => $scheduleMonday,
            'scheduleTuesday'   => $scheduleTuesday,
            'scheduleWednesday' => $scheduleWednesday,
            'scheduleThursday'  => $scheduleThursday,
            'scheduleFriday'    => $scheduleFriday,
        ] );

    }


}
