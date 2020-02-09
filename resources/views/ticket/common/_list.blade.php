<div class="table-responsive">
    <table class="data-table ticket-list">
        <thead>
        <tr>
            <th>{{ __("common.id_text") }}</th>
            <th>{{ __("common.title_text") }}</th>
            <th>{{ __("common.created_at_text") }}</th>
            <th>{{ __("ticket.created_by_text") }}</th>
            <th>{{ __("common.status_text") }}</th>
            <th>{{ __("ticket.answered_by_text") }}</th>
            <th>{{ __("ticket.answered_at_text") }}</th>
            <th>{{ __("common.options_text") }}</th>
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
                <td>@if (!empty($ticket->answeredBy)) {{ $ticket->answeredBy->name }} @else {{ __("common.not_set_text") }}@endif</td>
                <td>@if (!empty($ticket->answered_at)) {{ $ticket->answered_at }} @else {{ __("common.not_set_text") }}@endif</td>
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
                           onclick="confirm('{{ __("common.are_you_sure_text") }}');
                                   document.getElementById('ticket-{{ $ticket->id }}-remove-form').submit();"
                        >
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <form id="ticket-{{ $ticket->id }}-remove-form"
                              action="{{ route("admin.ticket.destroy", ["ticket" => $ticket->id]) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method("DELETE")
                        </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __("common.no_data_text") }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
{{ $tickets->links() }}