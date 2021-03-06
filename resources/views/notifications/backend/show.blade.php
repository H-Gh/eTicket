@extends('layouts.backend')
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("notification.Display notification")])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="content">
                    {!! ($notification->type)::formatText($notification->data["id"]) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
