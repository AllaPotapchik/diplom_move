<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dance_type;
use App\Models\Day_of_week;
use App\Models\Level;
use App\Models\Schedule;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $schedule = DB ::table( 'schedule' )
                       -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                       -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                       -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                       -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                       -> select( '*' )
                       -> orderBy( 'schedule.id' )
                       -> get();

        return view( 'admin.schedule.index', compact( 'schedule' ) );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dance_types = Dance_type ::all();
        $teachers    = Teachers ::all();
        $levels      = Level ::all();
        $days        = DB ::table( 'days_of_week' ) -> get();

        return view( 'admin.schedule.create', [
            'dance_types' => $dance_types,
            'teachers'    => $teachers,
            'levels'      => $levels,
            'days'        => $days,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
//        dd($request -> dance_type);
        $new_schedule_record                    = new Schedule();
        $new_schedule_record -> dance_type      = $request -> get( 'dance_type' );
        $new_schedule_record -> teacher_id      = $request -> get( 'teacher' );
        $new_schedule_record -> level_id        = $request -> get( 'level' );
        $new_schedule_record -> day_id          = $request -> get( 'day' );
        $new_schedule_record -> time            = $request -> time;
        $new_schedule_record -> available_count = $request -> count;

        $new_schedule_record -> save();

        return redirect() -> back() -> with( 'success', 'Запись добавлена' );

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Http\Response
     */
    public function show( Schedule $schedule ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Http\Response
     */
    public function edit( $schedule_id ) {
        $dance_types = Dance_type ::all();
        $teachers    = Teachers ::all();
        $levels      = Level ::all();
        $days        = DB ::table( 'days_of_week' ) -> get();
        $schedule    = DB ::table( 'schedule' ) -> where( 'id', $schedule_id )
                          -> join( 'teachers', 'schedule.teacher_id', '=', 'teachers.teacher_id' )
                          -> join( 'days_of_week', 'schedule.day_id', '=', 'days_of_week.day_id' )
                          -> join( 'dance_types', 'schedule.dance_type', '=', 'dance_types.dance_type_id' )
                          -> join( 'levels', 'schedule.level_id', '=', 'levels.level_id' )
                          -> select( '*' ) -> first();

        return view( 'admin.schedule.update', [
            'schedule'    => $schedule,
            'dance_types' => $dance_types,
            'teachers'    => $teachers,
            'levels'      => $levels,
            'days'        => $days,
        ] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $schedule_id ) {

        DB ::table( 'schedule' ) -> where( 'id', $schedule_id )
           -> update( [
               'dance_type'      => $request -> dance_type,
               'teacher_id'      => $request -> teacher,
               'level_id'        => $request -> level,
               'day_id'          => $request -> day,
               'time'            => $request -> time,
               'available_count' => $request -> count,
           ] );

        return redirect() -> back() -> with( 'success', 'Запись обновлена' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Schedule $schedule
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $schedule_id ) {
        DB ::table( 'schedule' ) -> where( 'id', $schedule_id )
           -> delete();

        return redirect() -> back() -> with( 'success', 'Запись удалена' );
    }
}
