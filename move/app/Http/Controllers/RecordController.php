<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Schedule;
use App\Models\Users_tariff;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecordController extends Controller {
    public function createRecord( $schedule_id_for_record ) {

        $have_record = DB ::table( 'records' ) -> where( 'user_id', Auth ::id() )
                          -> where( 'schedule_id', $schedule_id_for_record )
                          -> select( '*' )
                          -> get();

        $schedule_day = DB ::table( 'schedule' ) -> where( 'id', $schedule_id_for_record )
                           -> select( 'schedule.day_id' )
                           -> first();

        $today_day = date( 'N' );

        $current_date = date( 'Y-m-d' );
        $date_object  = new DateTime( $current_date );

        if ( $today_day >= $schedule_day -> day_id ) {
            $interval = 7 - $today_day;
            $date_object -> modify( '+' . $interval . ' days' );
            $date_object -> modify( '+' . $schedule_day -> day_id . ' days' );

        } else {
            $date_object -> modify( '-' . $today_day . 'day' );
            $date_object -> modify( '+' . $schedule_day -> day_id . ' days' );
        }

        $new_date = $date_object -> format( 'Y-m-d' );

        if ( sizeof( $have_record ) != 0 ) {
            return redirect() -> back() -> with( 'error', 'У вас уже есть запись на данное занятие' );
        } else {
            $new_record                = new Record();
            $new_record -> user_id     = Auth ::id();
            $new_record -> schedule_id = $schedule_id_for_record;
            $new_record -> date        = $new_date;
            $new_record -> save();

            $current_available_count = DB ::table( 'schedule' )
                                          -> where( 'id', '=', $schedule_id_for_record )
                                          -> decrement( 'available_count' );

            $current_schedule = DB ::table( 'schedule' )
                                   -> where( 'id', '=', $schedule_id_for_record )
                                   -> first();

            $have_subscription = DB ::table( 'user_subscriptions' )
                                    -> where( 'user_id', Auth ::id() )
                                    -> where( 'dance_type_id', $current_schedule -> dance_type )
                                    -> where( 'level_id', $current_schedule -> level_id )
                                    -> first();

            if ( $have_subscription ) {
                DB ::table( 'user_subscriptions' )
                   -> where( 'order_id', $have_subscription -> order_id )
                   -> decrement( 'available_count' );

                $subscription_available_count = DB ::table( 'user_subscriptions' )
                                                   -> where( 'order_id', $have_subscription -> order_id )
                                                   -> first();

                if ( $subscription_available_count -> available_count == 0 ) {
                    DB ::table( 'users_tariffs' )
                       -> where( 'tariff_type', 1 )
                       -> where( 'user_dance_type', $subscription_available_count -> dance_type_id );

                    DB ::table( 'user_subscriptions' )
                       -> where( 'order_id', $have_subscription -> order_id )
                       -> where( 'dance_type_id', $subscription_available_count -> dance_type_id )
                       -> update( [ 'status' => 0 ] );
                }

                return redirect() -> back() -> with( 'success', 'Вы записаны на урок, запись отобразиться в вашем личном кабинете' );
            }
        }
    }

    public function deleteRecord( $record_id, $schedule_id ) {
        date_default_timezone_set( "Europe/Minsk" );
        $order_time = DB ::table( 'records' )
                         -> join( 'schedule', 'records.schedule_id', 'schedule.id' )
                         -> where( 'record_id', $record_id ) -> get();
        $date_time  = $order_time[ 0 ] -> date . ' ' . $order_time[ 0 ] -> time;
        if ( strtotime( $date_time ) - time() >= 7200 ) {
            DB ::table( 'schedule' ) -> where( 'id', $schedule_id ) -> increment( 'available_count' );
            $current_schedule  = DB ::table( 'schedule' )
                                    -> where( 'id', '=', $schedule_id )
                                    -> first();
            $have_subscription = DB ::table( 'user_subscriptions' )
                                    -> where( 'user_id', Auth ::id() )
                                    -> where( 'dance_type_id', $current_schedule -> dance_type )
                                    -> where( 'level_id', $current_schedule -> level_id )
                                    -> first();

            if ( $have_subscription -> available_count == 0 ) {
                DB ::table( 'user_subscriptions' )
                   -> where( 'order_id', $have_subscription -> order_id )
                   -> increment( 'available_count');

                DB ::table( 'user_subscriptions' )
                   -> where( 'order_id', $have_subscription -> order_id )
                   -> update(  [ 'status' => 1 ] );
                DB ::table( 'records' ) -> where( 'record_id', $record_id ) -> delete();

                return redirect() -> back() -> with( 'success', 'Запись отменена' );
            } else {
                DB ::table( 'user_subscriptions' )
                   -> where( 'order_id', $have_subscription -> order_id )
                   -> increment( 'available_count' );
            }
            DB ::table( 'records' ) -> where( 'record_id', $record_id ) -> delete();

        } else {
            return redirect() -> back() -> with( 'error', 'Нельзя отменять занятие менее чем за 2 часа' );
        }
    }
}
