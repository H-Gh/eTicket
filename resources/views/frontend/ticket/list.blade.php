@extends('layouts.frontend')
@section('content')
    <div class="main-column">
        @include("frontend.top-bar")
        @include("notifications")
        <div class="main-content">
            @can("ticket.add")
                <a class="button primary mb-4" href="{{ route("ticket.create") }}">
                    <i class="fas fa-plus"></i> {{ __("ticket.New ticket") }}
                </a>
            @endcan
            <div class="box rounded">
                <div class="title">{{ __("ticket.Tickets list") }}</div>
                <div class="content">
                    <div class="table-responsive">
                        <table class="data-table ticket-list">
                            <thead>
                            <tr>
                                <th>{{ __("common.ID") }}</th>
                                <th>{{ __("common.Title") }}</th>
                                <th>{{ __("common.Status") }}</th>
                                <th>{{ __("common.Created at") }}</th>
                                <th>{{ __("common.Options") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tickets as $ticket)
                                <tr>
                                    <td style="width: 10%">{{ $ticket->id }}</td>
                                    <td style="width: 50%">{{ $ticket->title }}</td>
                                    <td style="width: 15%" class="
                                            @if ($ticket->status === App\Ticket::PENDING)
                                            text primary
                                            @elseif ($ticket->status === \App\Ticket::REJECTED)
                                            text danger
                                            @elseif ($ticket->status === \App\Ticket::ANSWERED)
                                            text success
                                            @endif
                                            ">{{ __("ticket." . $ticket->status) }}</td>
                                    <td style="width: 15%">{{ $ticket->created_at }}</td>
                                    <td style="width: 10%">
                                        <a href="{{ route("ticket.show", ["ticket" => $ticket->id]) }}"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>{{ __("ticket.You have No Ticket yet.") }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
