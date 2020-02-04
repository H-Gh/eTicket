@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <div class="title">{{ __("ticket.New ticket") }}</div>
                <div class="content">
                    <form action="{{ route("ticket.store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="ticket-title">{{ __("common.Title") }}</label>
                            <input id="ticket-title" type="text" name="title" value="{{ old("title") }}"/>
                            @error("title")
                            <span class="text danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ticket-text">{{ __("common.Text") }}</label>
                            <textarea name="text" id="ticket-text">{{ old("text") }}</textarea>
                            @error("text")
                            <span class="text danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="submit-button-container">
                            <button type="submit" class="button primary">{{ __("common.Send") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
