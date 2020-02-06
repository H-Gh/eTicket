<div class="table-responsive">
    <table class="data-table ticket-list">
        <thead>
        <tr>
            <th>{{ __("common.ID") }}</th>
            <th>{{ __("common.Title") }}</th>
            <th>{{ __("common.Created at") }}</th>
            <th>{{ __("ticket.Created by") }}</th>
            <th>{{ __("common.Status") }}</th>
            <th>{{ __("ticket.Answered by") }}</th>
            <th>{{ __("ticket.Answered at") }}</th>
            <th>{{ __("common.Options") }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tickets as $ticket)
            <tr>
                <td style="width: 10%">{{ $ticket->id }}</td>
                <td style="width: 30%">{{ $ticket->title }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>{{ $ticket->createdBy->name }}</td>
                <td class="
                                            @if ($ticket->status === App\Ticket::PENDING)
                        text primary
@elseif ($ticket->status === \App\Ticket::REJECTED)
                        text danger
@elseif ($ticket->status === \App\Ticket::ANSWERED)
                        text success
@endif
                        ">{{ __("ticket." . $ticket->status) }}</td>
                <td>@if (!empty($ticket->answeredBy)) {{ $ticket->answeredBy->name }} @else {{ __("common.Not set") }}@endif</td>
                <td>@if (!empty($ticket->answered_at)) {{ $ticket->answered_at }} @else {{ __("common.Not set") }}@endif</td>
                <td style="width: 10%" class="options">
                    @php
                        $showRoute = "ticket.show";
                        if(isset($isAdmin) && $isAdmin) {
                            $showRoute = "admin." . $showRoute;
                        }
                    @endphp
                    <a href="{{ route($showRoute, ["ticket" => $ticket->id]) }}"><i class="fas fa-eye"></i></a>
                    @can("ticket.edit")
                        <a href="{{ route("admin.ticket.edit", ["ticket" => $ticket->id]) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    @endcan
                    @can("ticket.remove")
                        <a href="#"
                           onclick="event.preventDefault();
                                   document.getElementById('ticket-{{ $ticket->id }}-remove-form').submit();"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="ticket-{{ $ticket->id }}-remove-form"
                              action="{{ route("admin.ticket.destroy", ["ticket" => $ticket->id]) }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __("common.There is no data yet.") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $tickets->links() }}