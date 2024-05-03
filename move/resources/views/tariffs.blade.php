@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/tariff.css'])
	<?php
	function formatText( $text ) {
		$lines = explode( "-", $text, 2 ); // Разбиваем текст только на две части
		if ( count( $lines ) > 1 ) {
			$remainingText = $lines[ 1 ]; // Получаем оставшийся текст
			$formattedText = $lines[ 0 ] . "<br/>-" . formatText( $remainingText ); // Форматируем текст с переносом строки
		} else {
			$formattedText = $text;
		}

		return $formattedText;
	}
	?>

    <div style="margin-top: 6rem" class="container">
        @foreach($tariff as $el)
				<?php
				$color = '';
				if ( $el -> tariff_name == 'Офлайн' )
					$color = '#BA80E6';
				if ( $el -> tariff_name == 'Онлайн' )
					$color = '#92ABFC';
				if ( $el -> tariff_name == 'Онлайн++' )
					$color = '#FFAF77';
				?>
            <div class="tariff_card" style="background: {{$color}};">
                <p class="tariff_title text-center mb-4">ТАРИФ "{{$el->tariff_name}}"</p>
                <div>
                    {{$el->description}}
                </div>
                <br>
                <div>
                    <p class="tariff_title">Что включает:</p>
						<?php echo formatText( $el -> contains ) ?>
                </div>
                <div>
                    <br>
                    <p class="tariff_title">Преимущества</p>
						<?php echo formatText( $el -> tariff_benefits ) ?>
                </div><?php if ( $el -> tariff_type == 1 ){ ?>
                <button><a href="/subscriptions">Выберите абонимент</a></button>
				<?php } else{ ?>
                <button value="{{$el->tariff_id}}"><a href="{{ route('programs', $el->tariff_id) }}">Выберите
                        программу</a></button>
				<?php } ?>
            </div>
        @endforeach

    </div>
@endsection
