<?php
/**
 * The main controller to handle users' notifications
 * PHP version 7.4
 *
 * @category Controller
 * @package  App\Http\Controllers\Backend
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\View\View;

/**
 * Class NotificationController
 *
 * @category Controller
 * @package  App\Http\Controllers\Backend
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class NotificationsController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view("notifications.backend.list")
            ->with(
                "notifications",
                Auth::user()
                    ->notifications()
                    ->paginate(config("eTicket.pagination_count"))
            );
    }

    /**
     * Display the specified resource.
     *
     * @param DatabaseNotification $notification The target notification
     *
     * @return Factory|View
     */
    public function show(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return \view("notifications.backend.show")
            ->with("notification", $notification);
    }

    /**
     * Make a notification read
     *
     * @param DatabaseNotification $notification The target notification
     *
     * @return RedirectResponse
     */
    public function read(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return redirect()->back();
    }

    /**
     * Make a notification unread
     *
     * @param DatabaseNotification $notification The target notification
     *
     * @return RedirectResponse
     */
    public function unread(DatabaseNotification $notification)
    {
        $notification->markAsUnread();
        return redirect()->back();
    }
}
