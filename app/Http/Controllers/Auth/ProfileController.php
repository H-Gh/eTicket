<?php
/**
 * This class will handle user profile
 * PHP version 7.4
 *
 * @category Auth
 * @package  App\Http\Controllers\Auth
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Http\Controllers\Auth;

use App\Facades\UserUpdater;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class ProfileController
 *
 * @category Auth
 * @package  App\Http\Controllers\Auth
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * The method to show form to user to edit their data
     *
     * @param User $user User object to be edit
     *
     * @return Factory|View
     */
    public function edit(User $user)
    {
        return view("auth.frontend.profile", ["user" => $user]);
    }

    /**
     * Store changes that user submitted
     *
     * @param User $user User object to be update
     *
     * @return RedirectResponse
     */
    public function update(User $user)
    {
        request()->validate(
            ["name" => "required", "password" => "nullable|confirmed|min:8"]
        );

        UserUpdater::updatePassword($user, request("password"));
        UserUpdater::updateRoles($user, request("roles"));
        UserUpdater::updatePermissions($user, request("permissions"));

        return redirect()
            ->back()
            ->with("success", __("auth.Settings has been saved successfully."));
    }
}
