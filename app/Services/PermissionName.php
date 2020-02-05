<?php
/**
 * This class will hold the name of permissions and their translation category
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
 * This class will hold the name of permissions and their translation category
 * PHP version PHP 7.4
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class PermissionName
{
    /**
     * The main name of permission in database
     *
     * @var string
     */
    private $databaseName;
    /**
     * The name of the permission
     *
     * @var string
     */
    private $name;
    /**
     * The category for translation
     *
     * @var string
     */
    private $category;

    /**
     * Set the main name of permission in database
     *
     * @param string $databaseName The name of permission in database
     *
     * @return PermissionName
     */
    public function setDatabaseName(string $databaseName): PermissionName
    {
        $this->databaseName = $databaseName;

        return $this;
    }

    /**
     * This method will give the main name of permission from database
     *
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * This method will give the name of permission
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * This method will set the name of permission
     *
     * @param string $name The name of the permission
     *
     * @return PermissionName
     */
    public function setName(string $name): PermissionName
    {
        $this->name = $name;

        return $this;
    }

    /**
     * This method will give the category of translation
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * This method will return the category for translation
     *
     * @param string $category The translation category
     *
     * @return PermissionName
     */
    public function setCategory(string $category): PermissionName
    {
        $this->category = $category;

        return $this;
    }
}