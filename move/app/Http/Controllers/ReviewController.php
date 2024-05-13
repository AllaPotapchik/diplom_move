<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller {
    public function makeReview( Request $request ) {
        $current_date = date( 'Y-m-d' );
        $date_object  = new DateTime( $current_date );

        if(Auth ::id()){
            DB ::table( 'reviews' ) -> insert( [
                'review_text' => $request -> review,
                'teacher_id'  => $request -> teacher_id,
                'user_id'     => Auth ::id(),
                'date'        => date('Y-m-d'),
                'time'        => date('H:i:s')
            ]);
            return redirect() -> back() -> with( 'success', '' );

        } else {
            return redirect() -> back() -> with( 'error', 'Для того, чтобы оставить отзыв, необходимо авторизоваться' );

        }
    }
}
