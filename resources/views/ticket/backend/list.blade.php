@extends('layouts.backend')
@include("ticket.backend._css")
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("ticket.tickets_list_text")])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="content">
                    @include("ticket.common._list", ["isAdmin" => true])
                </div>
            </div>
        </div>
    </div>
@endsection
