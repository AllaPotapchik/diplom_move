@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/tariff.css'])

    <div style="margin-top: 6rem" class="container">
        <div class="tariff_card element-animation about1" style="background-color: #BA80E6; margin-bottom: 4rem">
            <p class="tariff_title text-start mb-4">О НАС</p>
            <div>
                MOVE — это команда энергичных и талантливых танцоров, объедненных вместе для того, чтобы делиться своей
                любовью к танцам и вдохновлять других на движение и самовыражение. Присоединяйтесь к команде и окунитесь
                в мир движения, креативности
            </div>
        </div>
        <div class="tariff_card element-animation about2" style="background-color: #FFAF77; margin-bottom: 4rem">
            <p class="tariff_title text-start mb-4">НАША МИССИЯ</p>
            <div>
                Мы стремимся создать пространство, где каждый может найти свой танцевальный путь, раскрыть потенциал и
                насладиться красотой движения. Наша миссия — не просто обучать танцам, но и вдохновлять на творчество,
                самовыражение и новые открытия через танец.
            </div>
        </div>
        <div class="tariff_card element-animation about1" style="background-color: #92ABFC; margin-bottom: 4rem">
            <p class="tariff_title text-start mb-4">ИНДИВИДУЛЬНЫЙ ПОДХОД</p>
            <div>
                Для нас важно удобство и комфорт каждого ученика, поэтому мы решили сделать занитя танцами доступными
                каждому учитывая его зону комфорта и темп жизни. Наша фишка с разделением на оффлайн и онлайн форматы
                уже пришласть по душе многим нашим клиентам.
            </div>
        </div>
        <div class="tariff_card element-animation about2" style="background-color: #FF77B8; margin-bottom: 4rem">
            <p class="tariff_title text-start mb-4">Наша Философия</p>
            <div>
                Мы верим, что танец — это не просто движения, а способ выразить себя, раскрыть эмоции и создать что-то
                удивительное. В нашей студии каждый может найти свое вдохновение, научиться слышать музыку внутри себя и
                танцевать с собой и окружающими в ритме сердец.
            </div>
        </div>
    </div>
@endsection
