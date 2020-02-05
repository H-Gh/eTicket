@extends('layouts.backend')
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("auth.Users list")])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="content">
                    @include("auth._list")
                </div>
            </div>
        </div>
    </div>
@endsection