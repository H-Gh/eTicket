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

use App\Http\Controllers\Controller;
use App\Ticket;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            "frontend.ticket.list",
            [
                "tickets" => Ticket::orderBy("created_at")
                    ->where(
                        "created_by",
                        "=",
                        Auth::user()->getAuthIdentifier()
                    )
                    ->paginate(config("eTicket.pagination_count"))
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
        return view("frontend.ticket.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request Incoming request
     *
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validatedAttributes = $request->validate(
            [
                "title" => "required",
                "text" => "required|min:10"
            ],
            [],
            [
                "title" => __("common.Title"),
                "text" => __("common.Text")
            ]
        );
        $validatedAttributes["created_by"] = Auth::user()->getAuthIdentifier();
        Ticket::create($validatedAttributes);

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
        return view("frontend.ticket.show")->with(["ticket" => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ticket $ticket
     *
     * @return Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ticket  $ticket
     *
     * @return Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ticket $ticket
     *
     * @return Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
