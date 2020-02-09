@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.reset_password_text') }}</div>
            <div class="description">
                {{ __("auth.reset_password_advice_2") }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">


                    <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                           placeholder="{{ __('auth.email_address_text') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password" placeholder="{{ __('auth.password_text') }}" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password-confirm" type="password" class=""
                           name="password_confirmation"
                           required autocomplete="new-password" placeholder="{{ __('auth.password__confirm_text') }}">

                    <button type="submit" class="btn btn-primary">
                        {{ __('auth.reset_password_text') }}
                    </button>
                </form>
            </div>
        </div>
@endsection
