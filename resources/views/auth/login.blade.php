@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.login_text') }}</div>
            <div class="description">
                {{ __("auth.enter_app_advice") }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="{{ __('auth.email_address_text') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password" type="password"
                           class="@error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password" placeholder="{{ __('auth.password_text') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input class="stroke" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('auth.remember_me_text') }}
                    </label>

                    <button type="submit" class="button primary">
                        {{ __('auth.login_text') }}
                    </button>

                    @if (Route::has('password.request'))
                        <div class="mt-4">
                            <a href="{{ route('password.request') }}">
                                {{ __('auth.forget_password_text') }}
                            </a>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="mt-2">
                            <a href="{{ route('register') }}">
                                {{ __("auth.register_advice") }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
