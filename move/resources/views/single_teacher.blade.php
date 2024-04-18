@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/subscription.css'])
    <div class="container card_wrap">
       {{$teacher->teacher_name}}
    </div>
@endsection
