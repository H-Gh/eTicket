<?php
/**
 * The main controller to handle administration of tickets
 * PHP version 7.4
 *
 * @category Ticket
 * @package  App\Http\Controllers\Backend
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Http\Controllers\Backend;

use App\Facades\TicketManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketUpdateRequest;
use App\Ticket;
use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class TicketsController
 *
 * @category Ticket
 * @package  App\Http\Controllers\Backend
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class TicketsController extends Controller
{
    /**
     * TicketsController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(
            ["role_or_permission:ticket.admin|ticket.add"]
        )->only(["create", "store"]);
        $this->middleware(
            ["role_or_permission:ticket.admin|ticket.edit"]
        )->only(["edit", "update"]);
        $this->middleware(
            ["role_or_permission:ticket.admin|ticket.remove"]
        )->only("destroy");
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view(
            "ticket.backend.list",
            [
                "tickets" => Ticket::orderBy("created_at")
                    ->paginate(config("eTicket.pagination_count"))
            ]
        );
    }

    /**
     * Display the ticket.
     *
     * @param Ticket $ticket The target Ticket
     *
     * @return Factory|View
     */
    public function show(Ticket $ticket)
    {
        return view("ticket.backend.show")
            ->with(["ticket" => $ticket]);
    }

    /**
     * Show the form for editing the ticket.
     *
     * @param Ticket $ticket Target ticket
     *
     * @return Factory|View
     */
    public function edit(Ticket $ticket)
    {
        return view("ticket.backend.edit")
            ->with(
                [
                    "ticket" => $ticket,
                    "users" => User::all()
                ]
            );
    }

    /**
     * Update the ticket in storage.
     *
     * @param TicketUpdateRequest $request The received request
     * @param Ticket              $ticket  The target ticket
     *
     * @return RedirectResponse|Redirector
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $request->validated();
        $updateResult = TicketManager::update($request, $ticket);
        $redirect = redirect()->back();
        if ($updateResult) {
            $redirect->with(
                "success",
                __("ticket.The ticket updated successfully.")
            );
        } else {
            $redirect->with(
                "error",
                __("common.There are some problems on saving data.")
            );
        }

        return $redirect;
    }

    /**
     * Remove the ticket from storage.
     *
     * @param Ticket $ticket The target ticket
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Ticket $ticket)
    {
        if ($ticket->delete()) {
            return redirect()
                ->back()
                ->with("success", __("ticket.Ticket removed successfully."));
        } else {
            return redirect()
                ->back()
                ->with(
                    "success",
                    __("common.There are some problems on deleting data.")
                );
        }
    }
}
