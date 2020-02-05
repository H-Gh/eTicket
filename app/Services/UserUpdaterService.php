<?php
/**
 * This Class will handle all things that must be handle during user update
 * PHP version PHP 7.4
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Services;

use App\User;
use Hash;

/**
 * Class UserUpdaterService
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class UserUpdaterService
{
    /**
     * This method check entry password, update the password if not empty
     *
     * @param User   $user     The target User
     * @param string $password The password
     *
     * @return void
     */
    public function updatePassword(User $user, ?string $password)
    {
        if (empty($password)) {
            return;
        }
        $user->password = Hash::make($password);
        $user->save();
    }

    /**
     * This method sync users roles
     *
     * @param User  $user  The target User
     * @param array $roles The roles
     *
     * @return void
     */
    public function updateRoles(User $user, ?array $roles): void
    {
        if (empty($roles)) {
            $roles = [];
        }
        $user->syncRoles($roles);
    }

    /**
     * This method sync users roles
     *
     * @param User  $user        The target user
     * @param array $permissions The permissions
     *
     * @return void
     */
    public function updatePermissions(User $user, ?array $permissions): void
    {
        if (empty($permissions)) {
            $permissions = [];
        }
        $user->syncPermissions($permissions);
    }
}
