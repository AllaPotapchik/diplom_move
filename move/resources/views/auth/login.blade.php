@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
    @vite(['resources/css/index.css', 'resources/css/order.css' ])
    <div style="margin-top: 6rem" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="auth_card">
                <h1>Вход</h1>
                <div class="card-body user_info">
                    @if(session('error'))
                        <div class="alert error">
                            <h6><i class="icon fa fa-check"></i> {{ session('error') }}</h6>
                            <button type="button" class="close close_btn" id="close_btn" data-dismiss="alert" aria-hidden="true">×
                            </button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 input_wrap">
                            <div class="input_card">
                                <label for="phone">Телефон</label>
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 input_wrap">
                            <div class="input_card">
                                <label for="password">Пароль</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="auth_btns">
                                <button type="submit" class="button violet">
                                   Войти
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="auth_link" href="/register">
                                        Еще не зарегистрированы?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
