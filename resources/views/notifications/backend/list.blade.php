@extends('layouts.backend')
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("notification.Notifications")])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="content">
                    @include("notifications.common._list", ["customRoute" => "admin.notification.show"])
                </div>
            </div>
        </div>
    </div>
@endsection
