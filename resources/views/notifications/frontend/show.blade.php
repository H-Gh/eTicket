@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="title">{{ __("notification.Display notification") }}</div>
                <div class="content">
                    {!! ($notification->type)::formatText($notification->data["id"]) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
