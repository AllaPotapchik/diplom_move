@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/schedule.css'])
    <div class="container back_color">
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
{{--                <?php var_dump($new_count );?>--}}
            </div>
        @endif
    </div>
@endsection
