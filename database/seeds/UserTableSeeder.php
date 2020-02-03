<?php
/**
 * This class will add super-admin to database
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

/**
 * Class UserTableSeeder
 *
 * @category Auth
 * @package  Database\Seeds
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = new \App\User();
        $superAdminUser->password = Hash::make(
            env("SUPER_ADMIN_PASSWORD", "eTicketSuperAdminPassword")
        );
        $superAdminUser->email = "superAdmin@" . env("APP_NAME");
        $superAdminUser->name = "Super Admin";
        $superAdminUser->assignRole("super-admin");
        $superAdminUser->save();
    }
}
