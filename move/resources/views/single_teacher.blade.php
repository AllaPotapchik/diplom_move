@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/index.css', 'resources/css/teacher.css', 'resources/css/dance_types.css' ])
    <?php
    function splitTextIntoList( $text ) {
        $blocks = explode( '<br>', $text );
        $result = '<ul>';
        foreach ( $blocks as $block ) {
            $result .= '<li style="list-style:disc">' . trim( $block ) . '</li>';
        }
        $result .= '</ul>';

        return $result;
    } ?>

    <div style="margin-top: 6rem" class="container">
        <div class="teacher_info_wrap">
            <div class="personal">
                <div class="photo_name">
                    <img src="{{asset('storage')}}/teachers_photo/{{$teacher->photo_path}}">
                    <p>{{$teacher->teacher_name}}</p>
                </div>
                <div class="teacher_info">
                    <div class="experience">
                        <b>Опыт:</b> <br>
                        <?php echo splitTextIntoList( $teacher -> experience ) ?>
                    </div>
                    <div class="dance_type">
                        <b>Направления:</b><br>
                        <?php echo splitTextIntoList( $teacher -> title ) ?>
                    </div>
                    <div class="specialisation">
                        <b>Специализация:</b> <br>
                        <?php echo splitTextIntoList( $teacher -> specialisation ) ?>
                    </div>
                </div>
            </div>
            <div class="teacher_video">
                {!! $teacher->video !!}
            </div>
        </div>

        <div class="reviews teacher_info_wrap">
            @if(session('error'))
                <div class="alert alert-success">
                    <h6><i class="icon fa fa-check"></i> {{ session('error') }}</h6>
                    <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert"
                            aria-hidden="true">×
                    </button>
                </div>
            @endif
            <h1>Отзывы</h1>
            <div class="review_wrap">
                @foreach($reviews as $el)
                    <div class="review">
                        <p class="user_name">{{$el->name}}</p>
                        <div class="review_text">
                            {{$el->review_text}}
                        </div>
                        <p>
                            {{date( 'd.m.y', strtotime( $el->date )) }}
                            {{--                            {{date( 'H:i', strtotime( $el -> time ) )}}--}}
                        </p>
                    </div>
                @endforeach
            </div>
                <form class="review_form" method="post" action="{{route('makeReview')}}">
                    @csrf
                    <input type="text" required name="review" placeholder="Сообщение...">
                    <input type="hidden" value="{{$teacher->teacher_id}}" name="teacher_id">
                    <button type="submit">Отправить</button>
                </form>
            </div>
    </div>
@endsection
