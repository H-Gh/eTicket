@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.Confirm Password') }}</div>
            <div class="description">
                {{ __('auth.Please confirm your password before continuing.') }}
            </div>
            <div class="form">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password"
                           placeholder="{{ __('auth.Password') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                    <button type="submit" class="button primary">
                        {{ __('auth.Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                        <div class="mt-4">
                            <a href="{{ route('password.request') }}">
                                {{ __('auth.Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
