<?php

/**
 * This class handle everything about roles or permissions
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

/**
 * Class PermissionManagerService
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class PermissionManagerService
{

    /**
     * This method get the permission name and return the description
     *
     * @param string $roleOrPermission Role or permission name
     *
     * @return PermissionName
     */
    public function getName(string $roleOrPermission): ?PermissionName
    {
        switch ($roleOrPermission) {
        case "super-admin":
            return (new PermissionName())
                ->setDatabaseName("super-admin")
                ->setName("Super admin")
                ->setCategory("auth");
            break;
        case "user.admin":
            return (new PermissionName())
                ->setDatabaseName("user.admin")
                ->setName("Users admin")
                ->setCategory("auth");
            break;
        case "user.add":
            return (new PermissionName())
                ->setDatabaseName("user.add")
                ->setName("Add user")
                ->setCategory("auth");
            break;
        case "user.edit":
            return (new PermissionName())
                ->setDatabaseName("user.edit")
                ->setName("Edit user")
                ->setCategory("auth");
            break;
        case "user.remove":
            return (new PermissionName())
                ->setDatabaseName("user.remove")
                ->setName("Remove user")
                ->setCategory("auth");
            break;
        case "user.permission.assign":
            return (new PermissionName())
                ->setDatabaseName("user.permission.assign")
                ->setName("Assign permissions")
                ->setCategory("auth");
            break;
        case "ticket.admin":
            return (new PermissionName())
                ->setDatabaseName("ticket.admin")
                ->setName("Ticket admin")
                ->setCategory("ticket");
            break;
        case "ticket.add":
            return (new PermissionName())
                ->setDatabaseName("ticket.add")
                ->setName("Add ticket")
                ->setCategory("ticket");
            break;
        case "ticket.edit":
            return (new PermissionName())
                ->setDatabaseName("ticket.edit")
                ->setName("Edit ticket")
                ->setCategory("ticket");
            break;
        case "ticket.edit.content":
            return (new PermissionName())
                ->setDatabaseName("ticket.edit.content")
                ->setName("Edit ticket content")
                ->setCategory("ticket");
            break;
        case "ticket.remove":
            return (new PermissionName())
                ->setDatabaseName("ticket.remove")
                ->setName("Remove ticket")
                ->setCategory("ticket");
            break;
        case "ticket.answer":
            return (new PermissionName())
                ->setDatabaseName("ticket.answer")
                ->setName("Answer ticket")
                ->setCategory("ticket");
            break;
        case "ticket.assign":
            return (new PermissionName())
                ->setDatabaseName("ticket.assign")
                ->setName("Assign answerer")
                ->setCategory("ticket");
            break;
        default:
            return null;
        }
    }

    /**
     * This method get the permission name and return the translated description
     *
     * @param string $roleOrPermission Role or permission name
     *
     * @return string
     */
    public function getTranslatedName(string $roleOrPermission): ?string
    {
        $name = $this->getName($roleOrPermission);
        if (empty($name)) {
            return $name;
        }

        return __($name->getCategory() . "." . $name->getName());
    }

    /**
     * Check what if a user can see admin area or not
     *
     * @return bool
     */
    public function hasAnyAdminPermissions(): bool
    {
        return \Auth::user()->hasAnyPermission(
            [
                "user.add",
                "user.edit",
                "user.remove",
                "user.permission.assign",
                "ticket.edit",
                "ticket.edit.content",
                "ticket.remove",
                "ticket.answer",
                "ticket.assign",
            ]
        );
    }
}
