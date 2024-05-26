@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/dance_types.css', 'resources/css/index.css',])
    <?php
    if ( $dance_type -> title == 'ХИП-ХОП' )
        $color = '#BA80E6';
    if ( $dance_type -> title == 'ДЖАЗ-ФАНК' )
        $color = '#92ABFC';
    if ( $dance_type -> title == 'ВОГ' )
        $color = '#FFAF77';
    if ( $dance_type -> title == 'ТВЕРК' )
        $color = '#FF77B8';

    function splitTextIntoDivs( $text ) {
        $blocks = explode( '<br>', $text );
        $result = '';
        foreach ( $blocks as $block ) {
            $result .= '<div class="fit">' . trim( $block ) . '</div>';
        }

        return $result;
    } ?>

    <div style="margin-top: 6rem" class="container">
        <div class=" dance_type_card element-animation" style="background: {{$color}};">
            <h1>{{$dance_type->title}}</h1>
            <p class="dance_type_description">{!!$dance_type->description!!}</p>
        </div>
        <div class="fits element-animation">
            <h1>Для кого подходит {{$dance_type->title}}</h1>
            <div><?php echo splitTextIntoDivs( $dance_type -> type_benefits ) ?></div>
        </div>
        <div class="dance_type_video element-animation">
            {!! $dance_type->video !!}
        </div>
        <div class="first_class element-animation" style="background-color: {{$color}};">
            <div class="inner_part">
                <p><b>Если уверен, что <span style="text-transform: lowercase">{{$dance_type->title}}</span> это твое - сразу выбирай удобный тариф и окунись в мир <span style="text-transform: lowercase">{{$dance_type->title}}</span> </b></p>
                <a href="{{route('chooseTariff', $dance_type->dance_type_id)}}">
                    <button class="button white" >Выбрать тариф</button>
                </a>

            </div>
        </div>
    </div>

@endsection
