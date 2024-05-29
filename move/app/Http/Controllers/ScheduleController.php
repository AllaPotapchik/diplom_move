<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Users_tariff;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller {
    public function index() {

        $delete = DB ::table( 'records' )
                     -> join( 'schedule', 'schedule.id', 'records.schedule_id' )
                     -> where( 'records.date', '<', date( 'Y-m-d' ) )
                     -> where( 'time', '<', date( 'H:i:s' ) )
                     -> delete();

        if ( ! Auth ::check() ) {
            $scheduleMonday = DB ::table( 'schedule' )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> where( 'days_of_week.day_name', 'Понедельник' )
                                 -> select( '*' )
                                 -> orderBy( 'schedule.time' )
                                 -> get();

            $scheduleTuesday = DB ::table( 'schedule' )
                                  -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                  -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                  -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                  -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                  -> where( 'days_of_week.day_name', 'Вторник' )
                                  -> select( '*' )
                                  -> orderBy( 'schedule.time' )
                                  -> get();

            $scheduleWednesday = DB ::table( 'schedule' )
                                    -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                    -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                    -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                    -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                    -> where( 'days_of_week.day_name', 'Cреда' )
                                    -> select( '*' )
                                    -> orderBy( 'schedule.time' )
                                    -> get();

            $scheduleThursday = DB ::table( 'schedule' )
                                   -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                   -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                   -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                   -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                   -> where( 'days_of_week.day_name', 'Четверг' )
                                   -> select( '*' )
                                   -> orderBy( 'schedule.time' )
                                   -> get();

            $scheduleFriday = DB ::table( 'schedule' )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> where( 'days_of_week.day_name', 'Пятница' )
                                 -> select( '*' )
                                 -> orderBy( 'schedule.time' )
                                 -> get();
        } else {
            $user_id         = Auth ::id();
            $user_dance_type = DB ::table( 'users_tariffs' )
                                  -> where( 'user_id', $user_id )
                                  -> whereIn( 'tariff_type', [ 1, 3 ] )
                                  -> select( '*' )
                                  -> get();

            $user_dance_type_array = [];
            foreach ( $user_dance_type as $value ) {
                $user_dance_type_array[] = $value -> user_dance_type;
            }

            $user_levels = DB ::table( 'users_tariffs' )
                              -> where( 'user_id', Auth ::id() )
                              -> whereIn( 'tariff_type', [ 1, 3 ] )
                              -> select( 'users_tariffs.level_id' )
                              -> get();

            $user_levels_array = [];
            foreach ( $user_levels as $value ) {
                $user_levels_array[] = $value -> level_id;
            }

            $user_levels_offline = DB ::table( 'user_subscriptions' )
                                      -> where( 'user_id', Auth ::id() )
                                      -> whereIn( 'dance_type_id', $user_dance_type_array )
                                      -> select( 'user_subscriptions.level_id' )
                                      -> get();

            $scheduleMonday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $user_dance_type_array )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> join( 'users_tariffs', 'dance_types.dance_type_id', '=', 'users_tariffs.user_dance_type' )
                                 -> where( 'days_of_week.day_name', '=', 'Понедельник' )
                                 -> whereIn( 'dance_type', $user_dance_type_array )
                                 -> whereIn( 'users_tariffs.tariff_type', [ 1, 3 ] )
                                 -> whereIn( 'schedule.level_id', $user_levels_array )
                                 -> orderBy( 'schedule.time' )
                                 -> distinct()
                                 -> get();

            $scheduleTuesday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $user_dance_type_array )
                                  -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                  -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                  -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                  -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                  -> join( 'users_tariffs', 'dance_types.dance_type_id', '=', 'users_tariffs.user_dance_type' )
                                  -> where( 'days_of_week.day_name', '=', 'Вторник' )
                                  -> whereIn( 'schedule.level_id', $user_levels_array )
                                  -> whereIn( 'users_tariffs.tariff_type', [ 1, 3 ] )
                                  -> whereIn( 'schedule.level_id', $user_levels_array )
                                  -> orderBy( 'time' )
                                  -> select( '*' )
                                  -> orderBy( 'schedule.time' )
                                  -> get();

            $scheduleWednesday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $user_dance_type_array )
                                    -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                    -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                    -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                    -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                    -> join( 'users_tariffs', 'dance_types.dance_type_id', '=', 'users_tariffs.user_dance_type' )
                                    -> where( 'days_of_week.day_id', 3 )
                                    -> whereIn( 'dance_type', $user_dance_type_array )
                                    -> whereIn( 'users_tariffs.tariff_type', [ 1, 3 ] )
                                    -> whereIn( 'schedule.level_id', $user_levels_array )
                                    -> orderBy( 'schedule.time' )
                                    -> get();

            $scheduleThursday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $user_dance_type_array )
                                   -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                   -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                   -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                   -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                   -> join( 'users_tariffs', 'dance_types.dance_type_id', '=', 'users_tariffs.user_dance_type' )
                                   -> where( 'days_of_week.day_name', '=', 'Четверг' )
                                   -> whereIn( 'schedule.level_id', $user_levels_array )
                                   -> whereIn( 'users_tariffs.tariff_type', [ 1, 3 ] )
                                   -> whereIn( 'schedule.level_id', $user_levels_array )
                                   -> select( '*' )
                                   -> orderBy( 'schedule.time' )
                                   -> get();

            $scheduleFriday = DB ::table( 'schedule' ) -> whereIn( 'dance_type', $user_dance_type_array )
                                 -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                                 -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                                 -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                                 -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                                 -> join( 'users_tariffs', 'dance_types.dance_type_id', '=', 'users_tariffs.user_dance_type' )
                                 -> where( 'days_of_week.day_name', '=', 'Пятница' )
                                 -> whereIn( 'schedule.level_id', $user_levels_array )
                                 -> whereIn( 'users_tariffs.tariff_type', [ 1, 3 ] )
                                 -> whereIn( 'schedule.level_id', $user_levels_array )
                                 -> select( '*' )
                                 -> orderBy( 'schedule.time' )
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
