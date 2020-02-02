@extends('layouts.frontend')

@section('content')
    <div class="auth-form-container">
        <div class="logo">
            <div class="logo-image"></div>
        </div>
        <div class="form-box box">
            <div class="title">{{ __('auth.Verify Your Email Address') }}</div>
            <div class="description">
                {{ __('auth.Before proceeding, please check your email for a verification link.') }}
            </div>
            <div class="form">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('auth.If you did not receive the email, click on below button.') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="button primary">{{ __('auth.Send verification email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
