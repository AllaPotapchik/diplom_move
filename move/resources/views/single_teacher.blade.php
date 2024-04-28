@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/subscription.css'])
    <div class="container card_wrap">
        {{$teacher->teacher_name}}
        <div class="review_wrap">
            @if(session('error'))
                <div class="alert alert-success">
                    <h6><i class="icon fa fa-check"></i> {{ session('error') }}</h6>
                    <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×</button>
                </div>
            @endif
            <form method="post" action="{{route('makeReview')}}">
                @csrf
                <input type="text" required name="review">
                <input type="hidden" value="{{$teacher->teacher_id}}" name="teacher_id">
                <button type="submit" class="text-dark">Отправить</button>
            </form>
            @foreach($reviews as $el)
                <div>
                    {{$el->review_text}}
                    <div>
                        {{$el->name}}
                        {{$el->date}}
                        {{date( 'H:i', strtotime( $el -> time ) )}}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
