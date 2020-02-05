<?php
/**
 * This class will hold information of sidebar items
 * PHP version PHP 7.4
 *
 * @category View
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version  GIT: <git_id>
 * @link     null
 */

namespace App\Services;

use Illuminate\Routing\Route;

/**
 * This class will hold information of sidebar items
 * PHP version PHP 7.4
 *
 * @category View
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class SidebarItem
{
    /**
     * Icon class of item
     *
     * @var string
     */
    private $icon;
    /**
     * Text of item
     *
     * @var string
     */
    private $text;
    /**
     * Route which when item clicked, page will redirect to
     *
     * @var string
     */
    private $routeName;
    /**
     * The permissions which if user have the, the item will show
     *
     * @var array
     */
    private $permissions = [];

    /**
     * The children of this Item which they are SidebarItem too
     *
     * @var array
     */
    private $children = [];

    /**
     * Set icon css class
     *
     * @param string $icon Icon class of item
     *
     * @return SidebarItem
     */
    public function setIcon(string $icon): SidebarItem
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get item icon
     *
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Set text of item
     *
     * @param string $text The text that will show in item
     *
     * @return SidebarItem
     */
    public function setText(string $text): SidebarItem
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get icon text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Set the route which when item clicked, page will redirect to
     *
     * @param string $routeName The item route
     *
     * @return SidebarItem
     */
    public function setRouteName(string $routeName): SidebarItem
    {
        $this->routeName = $routeName;
        return $this;
    }

    /**
     * Get item route
     *
     * @return string
     */
    public function getRouteName(): string
    {
        return $this->routeName;
    }

    /**
     * Set permissions which if user have the, the item will show
     *
     * @param string $permission The item permissions
     *
     * @return SidebarItem
     */
    public function addPermission(string $permission): SidebarItem
    {
        $this->permissions[] = $permission;
        return $this;
    }

    /**
     * Set permissions which if user have the, the item will show
     *
     * @param array $permissions The item permissions
     *
     * @return SidebarItem
     */
    public function addPermissions(array $permissions)
    {
        $this->permissions = array_merge($permissions, $this->permissions);
        return $this;
    }

    /**
     * Get item permissions
     *
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * Add a new child to this Item
     *
     * @param SidebarItem $child A new SidebarItem to be child to this item
     *
     * @return SidebarItem
     */
    public function addChild(SidebarItem $child): SidebarItem
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * Get item children
     *
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Return number of children of this Item
     *
     * @return int
     */
    public function childrenCount(): int
    {
        return count($this->children);
    }

    /**
     * Check what if the this item has children or not
     *
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->childrenCount() > 0;
    }

    /**
     * Check if item has same controller that current route has
     *
     * @param Route $route Target route
     *
     * @return bool
     */
    public function hasSameControllerWithRoute(?Route $route = null): bool
    {
        if (empty($route)) {
            $route = \Route::current();
        }
        return
            get_class(
                \Route::getRoutes()
                    ->getByName($this->getRouteName())
                    ->getController()
            ) === get_class($route->getController());
    }

    /**
     * Check if item is the package which this received route is or not
     *
     * @param Route $route Target route
     *
     * @return bool
     */
    public function ownRoute(?Route $route = null): bool
    {
        if (empty($route)) {
            $route = \Route::current();
        }
        return
            \Route::getRoutes()->getByName($this->getRouteName())->uri()
            === $route->uri();
    }
}