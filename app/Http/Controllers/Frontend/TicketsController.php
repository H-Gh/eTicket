<?php
/**
 * The main controller to handle tickets of users
 * PHP version 7.4
 *
 * @category Ticket
 * @package  App\Frontend\Controller
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Http\Controllers\Frontend;

use App\Facades\TicketManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Ticket;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class TicketsController
 *
 * @category Ticket
 * @package  App\Frontend\Controller
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view(
            "ticket.frontend.list",
            [
                "tickets" => Ticket::orderBy("created_at")
                    ->where(
                        "created_by",
                        "=",
                        Auth::user()->getAuthIdentifier()
                    )
                    ->paginate(config("eTicket.pagination_count"))
//                "tickets" => ""
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view("ticket.frontend.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTicketRequest $request Incoming request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(StoreTicketRequest $request)
    {
        $request->validated();
        TicketManager::create($request);

        return redirect()
            ->route("ticket.list")
            ->with(
                "success",
                __(
                    <<<TAG
ticket.Your ticket saved successfully and will be reviewed as soon as possible.
TAG
                )
            );
    }

    /**
     * Display the specified resource.
     *
     * @param Ticket $ticket The target ticket
     *
     * @return Factory|View
     */
    public function show(Ticket $ticket)
    {
        return view("ticket.frontend.show")->with(["ticket" => $ticket]);
    }
}