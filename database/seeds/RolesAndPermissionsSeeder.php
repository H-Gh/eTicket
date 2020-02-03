<?php
/**
 * This class will add default roles and permissions to database
 * PHP version 7.4
 *
 * @category Auth
 * @package  Database\Seeds
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

/**
 * Class PermissionsSeeder
 *
 * @category Auth
 * @package  Database\Seeds
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Users permissions
        Permission::create(['name' => 'user.add']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.remove']);
        Permission::create(['name' => 'user.permission.assign']);

        // Users admin role
        $userAdminRole = Role::create(["name" => "user.admin"]);
        $userAdminRole->givePermissionTo(
            Permission::query()->where("name", "LIKE", "user.%")->get()
        );

        // Tickets permissions
        Permission::create(['name' => 'ticket.add']);
        Permission::create(['name' => 'ticket.edit']);
        Permission::create(['name' => 'ticket.remove']);
        Permission::create(['name' => 'ticket.answer']);
        Permission::create(['name' => 'ticket.assign']);


        // Tickets admin role
        $ticketAdminRole = Role::create(["name" => "ticket.admin"]);
        $ticketAdminRole->givePermissionTo(
            Permission::query()->where("name", "LIKE", "ticket.%")->get()
        );

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
