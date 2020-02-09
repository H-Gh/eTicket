@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.password__confirm_text') }}</div>
            <div class="description">
                {{ __('auth.confirm_password_before_continue_text') }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password"
                           placeholder="{{ __('auth.password_text') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <button type="submit" class="button primary">
                        {{ __('auth.password__confirm_text') }}
                    </button>

                    @if (Route::has('password.request'))
                        <div class="mt-4">
                            <a href="{{ route('password.request') }}">
                                {{ __('auth.forget_password_text') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
