@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css', 'resources/css/lesson.css', 'resources/css/account.css'])
    <div style="margin-top: 6rem" class="container back_color mr-2 ml-2">
        @foreach($lesson as $el)
            <div class="container">
            <div class="program_title">{{$el->lesson_name}}</div>
            <div class="lesson_about">
                <p class="lesson_description"> {{$el->lesson_description}}</p>
                <p>Инвентарь: {{$el->equipment}}</p>
                <p>Длительность урока: <?php echo date( 'i', strtotime( $el -> duration ) ); ?> минут</p>
            </div>
            <div class="lesson_video">
{{--                {!! $el->video !!}--}}


                                <video width="320" height="240" controls>
                                    <source src="{{asset('storage')}}/lesson_video/{{$el->video}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                <br>
            </div>
                <form action="{{ route('uploadVideo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" required name="video">
                    <input type="hidden" value="{{$el->lesson_id}}" name="lesson_id">
                    <input type="hidden" value="{{$program_id}}" name="program_id">
                    @if(session('success'))
                        <div class="alert alert-success">
                            <p>{{session('success')}}</p>
                        </div>
                        <br/>
                    @endif
                    <button type="submit" class="text-dark">Загрузить видео</button>
                </form>
            </div>
        <br>
        <br>
        <br>
            <div>
                <a href="{{route('endLesson', $el->lesson_id)}}">
                    <button class="text-dark">Отментить урок как пройденный</button>
                </a>
            </div>
        @endforeach
    </div>
@endsection
