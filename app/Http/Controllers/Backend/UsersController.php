<?php
/**
 * The main controller to handle administration of users
 * PHP version 7.4
 *
 * @category Auth
 * @package  App\Http\Controllers\Backend
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Http\Controllers\Backend;

use App\Facades\UserManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class UsersController
 *
 * @category Auth
 * @package  App\Http\Controllers\Backend
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(
            ["role_or_permission:user.admin|user.add"]
        )->only(["create", "store"]);
        $this->middleware(
            ["role_or_permission:user.admin|user.edit"]
        )->only(["edit", "update"]);
        $this->middleware(
            ["role_or_permission:user.admin|user.remove"]
        )->only("destroy");
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view("auth.list")
            ->with("users", User::paginate(config("eTicket.pagination_count")));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view("auth.backend.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request The received request
     *
     * @return RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        $request->validated();
        $requestAllItems = UserManager::purifyRequest($request);
        $user = User::create($requestAllItems);
        UserManager::updateRoles($user, request("roles"));
        UserManager::updatePermissions($user, request("permissions"));

        return redirect()
            ->route("admin.user.list")
            ->with("success", "auth.User created successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     *
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user The target user
     *
     * @return Factory|View
     */
    public function edit(User $user)
    {
        return \view(
            "auth.backend.update",
            [
                "user", $user
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User    $user
     *
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     *
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
