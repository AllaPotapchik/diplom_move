@extends('layouts.app')

@section('content')
    @vite(['resources/css/index.css', 'resources/css/order.css' ])
    <div style="margin-top: 6rem" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="auth_card">
                    <h1>Регистрация</h1>
                    <div class="card-body user_info">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3 input_wrap">
                                <div class="input_card">
                                    <label for="name">Имя</label>
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 input_wrap">
                                <div class="input_card">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 input_wrap">
                                <div class="input_card">
                                    <label for="phone">Телефон</label>
                                    <input id="phone" type="tel"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 input_wrap">
                                <div class="input_card">
                                    <label for="password" >Пароль</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 input_wrap">
                                <div class="input_card">
                                    <label for="password-confirm" >Повторите пароль</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="auth_btns">
                                    <button type="submit">
                                        Зарегистрироваться
                                    </button>
                                    <a class="auth_link" href="/login">
                                        {{ __('Уже зарегистрированы?') }}
                                    </a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
