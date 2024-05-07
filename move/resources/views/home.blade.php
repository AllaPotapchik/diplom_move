@extends('layouts.app')
@section('title')
    Студия танцев MOVE
@endsection

@section('content')
    @vite(['resources/css/index.css', 'resources/css/slider.css','resources/js/slider.js', 'resources/css/dance_types.css' ])
    <div class="container" style="margin-top: 6rem">
        <div class="back_color main_screen">
            <img src="{{asset('images/main_logo.png')}}">
        </div>
        <div class="main_screen quote_background">
            <blockquote class="quote">
                <p><b>Умение танцевать даёт тебе величайшую из свобод: выразить всего себя в полной мере таким, какой ты
                        есть.</b></p>
                <p class="mb-0">&copy; Генри Линк</p>
            </blockquote>
        </div>
        <div class="types_slider">
            <div class="dance_type_card" style="background: #BA80E6">
                <div class="card_info">
                    <div class="card_text">
                        <h1 class="dance_type_name">ХИП-ХОП</h1>
                        <p class="dance_type_description">Хип-хоп — это энергичное уличное направление танца,
                            отражающее культуру и самовыражение через ритмичные движения,
                            импровизацию и индивидуальный стиль танцоров. Он сочетает в себе элементы фанка,
                            соула, брейк-данса и джаза. </p>
                        <a href="{{route('singleType', 1)}}">
                            <button class="text-dark">Узнать больше</button>
                        </a>
                    </div>
                    <img src="{{asset('/images/hip_hop.png')}}">
                </div>
            </div>
            <div class="dance_type_card" style="background: #92ABFC">
                <div class="card_info">
                    <div class="card_text">
                        <h1 class="dance_type_name">ДЖАЗ-ФАНК</h1>
                        <p class="dance_type_description">Джаз-фанк — самое популярное танцевальное направление
                            в шоу-бизнес индустрии. Оно объедининяет такие танцевальные стили как vogue,
                            waacking, hip-hop и jazz. Это новый, свободный, привлекательный стиль.</p>
                        <a href="{{route('singleType', 2)}}">
                            <button class="text-dark">Узнать больше</button>
                        </a>                    </div>
                    <img style="margin-right: 8rem" src="{{asset('/images/juzz_funk.png')}}">
                </div>
            </div>
            <div class="dance_type_card" style="background: #FFAF77">
                <div class="card_info">
                    <div class="card_text">
                        <h1 class="dance_type_name">ВОГ</h1>
                        <p class="dance_type_description">Вог — это уникальный и экспрессивный стиль танцев,
                            вдохновленнй модными журналами и бальными танцами. Он воплощает превосходную координацию,
                            несомненное чувство ритма, музыки.</p>
                        <a href="{{route('singleType', 17)}}">
                            <button class="text-dark">Узнать больше</button>
                        </a>                    </div>
                    <img style="margin-right: 8rem" src="{{asset('/images/vogue.png')}}">
                </div>
            </div>
            <div class="dance_type_card" style="background: #FF77B8">
                <div class="card_info">
                    <div class="card_text">
                        <h1 class="dance_type_name">ТВЕРК</h1>
                        <p class="dance_type_description">Тверк — современное направление танца, основанное на
                            активных ритмичных движениях ягодицами и бёдрами. Тверк полезен не только для поддержания
                            мышц в тонусе, но и для здоровья.</p>
                        <a href="{{route('singleType', 18)}}">
                            <button class="text-dark">Узнать больше</button>
                        </a>                    </div>
                    <img src="{{asset('/images/twerk.png')}}">
                </div>
            </div>
        </div>
        <div class="tariffs">
            <h1>Занимайся тогда, когда удобно</h1>
            <div class="tariffs_wrap">
                <div class="tariff">
                    <p>ТАРИФ</p>
                    <p class="tariff_name">ОФФЛАЙН</p>
                    <div class="tariff_description">Выбирай удобное для себя время и занимайся в студии
                        с лучшими тренерами вместе с другими учениками
                        в атмосферной студии.
                    </div>
                    <p class="tariff_price">150 BYN</p>
                    <a href="{{route('subscriptions', [1,0])}}">
                        <button>КУПИТЬ</button>
                    </a>

                </div>
                <div class="tariff">
                    <p>ТАРИФ</p>
                    <p class="tariff_name">Онлайн</p>
                    <div class="tariff_description">Получи доступ к полноценной программе видео
                        уроков и знанимайся в любом удобном месте в любое время.
                    </div>
                    <p class="tariff_price">100 BYN</p>
                    <a href="{{ route('programs', [2,0])}}">
                        <button>КУПИТЬ</button>
                    </a>

                </div>
                <div style="margin-right: 0" class="tariff">
                    <p>ТАРИФ</p>
                    <p class="tariff_name">Онлайн++</p>
                    <div class="tariff_description">Получи доступ к онлайн тренировкам,
                        а если захочется ощутить атмосферу настоящего офлайн урока - ждем тебя в зале.
                    </div>
                    <p class="tariff_price">200 BYN</p>
                    <a href="{{ route('programs', [2,0])}}">
                        <button>КУПИТЬ</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="benefit_background"></div>
        <div class="benefits">
            <h1>Почему именно move?</h1>
            <div class="benefit_wrap">
                <div class="benefit">
                    <div class="circle"><p><span>1</span></p></div>
                    <p>Только в нашей студии есть возможность заниматься как офлайн,
                        так и онлайн, что позволяет вам лекго подстраивать график тренировок под себя</p>
                </div>
                <div class="benefit">
                    <div class="circle"><p><span>2</span></p></div>
                    <p>Наша команда состоит из опытных инструкторов
                        и танцоров, готовых поделиться своими знаниями и помочь вам достичь высоких результатов</p>
                </div>
                <div class="benefit">
                    <div class="circle"><p><span>3</span></p></div>
                    <p>Мы ценим уникальность каждого ученика
                        и создаем комфортную обстановку для развития и самовыражения, учитывая ваши потребности и
                        цели.</p>
                </div>
            </div>

        </div>
        <div class="first_class">
            <div class="inner_part">
                <p><b>Уже знаешь какое направление хочешь попробовать?
                        Тогда выбирай подходяшее время и записывайся на первоепробное занятие </b></p>
                <button class="text-dark">Записаться на первое занятие</button>
            </div>
        </div>
    </div>
@endsection


