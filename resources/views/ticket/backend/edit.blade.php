@extends('layouts.backend')
@include("ticket.backend._css")
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("ticket.Edit ticket #:number", ["number" => $ticket->id])])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="content">
                    @include("ticket.backend._form", ["ticket" => $ticket])
                </div>
            </div>
        </div>
    </div>
@endsection
