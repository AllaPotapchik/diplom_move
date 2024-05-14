@extends('layouts.app')
@section('title')
    Расписание
@endsection
@section('content')
    @vite(['resources/css/contact.css'])

    <div style="margin-top: 6rem" class="container">
        <div class="contact_wrap">
            <div class="contact_info">
                <h1>КОНТАКТЫ</h1>
                <b>Адресс</b>
                г. Минск ул. Скрыганова д.16
                <br>
                <br>
                <b>Телефон</b>
                МТС +375 33 6993616
                <br>
                А1 +375 33 6993616
                <br>
                <br>
                <b>Email</b>
                movedance@gmail.com
            </div>
            <div class="contact_map">
                <div style="position:relative;overflow:hidden; border-radius: 2rem; height: 100%; min-height: 20rem"><a
                        href="https://yandex.by/maps/157/minsk/?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:0px;">Минск</a><a
                        href="https://yandex.by/maps/157/minsk/house/Zk4YcwVgTkIPQFtpfXVxeXhlbQ==/?ll=27.520778%2C53.908469&utm_medium=mapframe&utm_source=maps&z=16.69"
                        style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Скрыганова, 16 —
                        Яндекс Карты</a>
                    <iframe
                        src="https://yandex.by/map-widget/v1/?ll=27.520778%2C53.908469&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoxNTI5MDMxMzAwEkPQkdC10LvQsNGA0YPRgdGMLCDQnNGW0L3RgdC6LCDQstGD0LvRltGG0LAg0KHQutGA0YvQs9Cw0L3QsNCy0LAsIDE2IgoNjircQRVFoldC&z=16.69"
                        width="100%" height="100%" frameborder="1" allowfullscreen="true"
                        style="position:relative;  min-height: 20rem"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
