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
use App\Http\Middleware\CheckAdminPrivilage;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
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
        $this->middleware(CheckAdminPrivilage::class);
        $this->middleware(["role_or_permission:user.admin|user.add"])
            ->only(["create", "store"]);
        $this->middleware(["role_or_permission:user.admin|user.edit"])
            ->only(["edit", "update"]);
        $this->middleware(["role_or_permission:user.admin|user.remove"])
            ->only("destroy");
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
            ->route("admin.user.index")
            ->with("success", __("auth.new_user_created_successfully_text"));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user The target user
     *
     * @return Factory|View
     */
    public function show(User $user)
    {
        return \view("auth.backend.show")
            ->with("user", $user);
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
            "auth.backend.edit",
            ["user" => $user]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request The received request
     * @param User              $user    The target user
     *
     * @return RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $request->validated();
        $allRequestItems = UserManager::purifyRequest($request);
        $user->update($allRequestItems);
        UserManager::updateRoles($user, request("roles"));
        UserManager::updatePermissions($user, request("permissions"));
        return redirect()
            ->back()
            ->with("success", __("auth.user_updated_successfully_text"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user The target user
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $redirect = redirect()->route("admin.user.index");
        if ($user->delete()) {
            return $redirect->with(
                "success",
                __("auth.user_deleted_successfully_text")
            );
        } else {
            return $redirect->with(
                "error",
                __("common.problem_on_saving_text")
            );
        }
    }
}
