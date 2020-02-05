@extends("layouts.backend")
@section("css")
    <link href="{{ asset("css/profile.css") }}" rel="stylesheet"/>
@endsection
@section("js")
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
@section('content')
    <div class="main-column">
        @include("backend.top-bar", ["pageTitle" => __("auth.Edit user #:number", ["number" => $user->id])])
        @include("notifications")
        <div class="main-content">
            <div class="box rounded">
                <form method="POST" action="{{ route("admin.user.update", ["user" => $user]) }}">
                    @csrf
                    <div class="content">
                        <div class="container-fluid" style="display: flex">
                            <div class="row" style="width: 100%; margin: 0">
                                @include("auth._basic-information")
                                @include("auth._roles-and-permissions")
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" class="button primary">{{ __("common.Save") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection