@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="title">{{ __("notification.Notifications") }}</div>
                <div class="content">
                    @include("notifications.common._list")
                </div>
            </div>
        </div>
    </div>
@endsection
