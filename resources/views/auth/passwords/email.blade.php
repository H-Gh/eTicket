@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.reset_password_text') }}</div>
            <div class="description">
                {{ __("auth.reset_password_advice") }}
            </div>
            <div class="form">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="{{ __('auth.email_address_text') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <button type="submit" class="button primary">
                        {{ __('auth.send_password_reset_link_button_text') }}
                    </button>
                    @if (Route::has('login'))
                        <div class="mt-4">
                            <a href="{{ route('login') }}">
                                {{ __("auth.login_advice") }}
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
