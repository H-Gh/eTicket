<?php

/**
 * This class is a Facade class for UserUpdaterService
 * PHP version PHP 7.4
 *
 * @category User
 * @package  App\Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */


namespace App\Facades;

use App\User;
use Illuminate\Support\Facades\Facade;

/**
 * Class UserUpdaterFacade
 *
 * @category User
 * @package  App\Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 * @method   static void updatePassword(User $user, string $password)
 * @method   static void updateRoles(User $user, array $roles)
 * @method   static void updatePermissions(User $user, array $permissions)
 */
class UserUpdater extends Facade
{
    /**
     * This method will define accessor of UserUpdaterFacade
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'userUpdater';
    }
}
