@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.Reset Password') }}</div>
            <div class="description">
                {{ __("auth.To reset password, please enter your email and new password.") }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">


                    <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                           placeholder="{{ __('auth.E-Mail Address') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password" placeholder="{{ __('auth.Password') }}" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <input id="password-confirm" type="password" class=""
                           name="password_confirmation"
                           required autocomplete="new-password" placeholder="{{ __('auth.Confirm Password') }}">

                    <button type="submit" class="btn btn-primary">
                        {{ __('auth.Reset Password') }}
                    </button>
                </form>
            </div>
        </div>
@endsection
