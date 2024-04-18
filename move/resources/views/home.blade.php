@extends('layouts.app')
@section('title')
    Студия танцев MOVE
@endsection


    @section('content')
        @vite(['resources/css/index.css'])
        <div class="container back_color main_screen">
<img src="{{asset('images/main_logo.png')}}">
        </div>
    @endsection


