<?php
/**
 * This class handle everything about roles or permissions
 * PHP version PHP 7.4
 *
 * @category Facade
 * @package  App\Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Facades;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * This class handle everything about roles or permissions
 * PHP version PHP 7.4
 *
 * @category Facade
 * @package  App\Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 * @method   static string getName(string $roleOrPermission)
 * @method   static string getTranslatedName(string $roleOrPermission)
 * @method   static bool hasAnyAdminPermissions()
 */
class PermissionManager extends Facade
{
    /**
     * This method will define accessor of PermissionManager
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'permissionManager';
    }
}