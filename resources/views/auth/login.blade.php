@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.Login') }}</div>
            <div class="description">
                {{ __("auth.To enter app, please enter your email and password") }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="{{ __('auth.E-Mail Address') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password" type="password"
                           class="@error('password') is-invalid @enderror" name="password" required
                           autocomplete="current-password" placeholder="{{ __('auth.Password') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input class="stroke" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('auth.Remember Me') }}
                    </label>

                    <button type="submit" class="button primary">
                        {{ __('auth.Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <div class="mt-4">
                            <a href="{{ route('password.request') }}">
                                {{ __('auth.Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="mt-2">
                            <a href="{{ route('register') }}">
                                {{ __("auth.Don't have account? Register") }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
