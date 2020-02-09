<?php
/**
 * This class format messages of notifications
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
 * This class format messages of notifications
 * PHP version PHP 7.4
 *
 * @category Service
 * @package  App\Services
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class MessageFormatter
{
    /**
     * The header of message
     *
     * @var string
     */
    private $header;

    /**
     * The body of message
     *
     * @var string
     */
    private $body;

    /**
     * The route of the target
     *
     * @var string
     */
    private $route;
    /**
     * The parameters of route
     *
     * @var array
     */
    private $parameters;
    /**
     * The text of button
     *
     * @var string
     */
    private $buttonText;

    public function __construct()
    {
        $this->buttonText = __("common.check_something_text");
    }

    /**
     * This method will fill header property
     *
     * @param string $header The header of message
     *
     * @return MessageFormatter
     */
    public function setHeader(string $header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * This method will fill body property
     *
     * @param string $body The body of message
     *
     * @return MessageFormatter
     */
    public function setBody(string $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * This method will fill route property
     *
     * @param string $route The route of the target
     *
     * @return MessageFormatter
     */
    public function setRoute(string $route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * This method will fill parameters property
     *
     * @param array $parameters The batch insert
     *
     * @return MessageFormatter
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = array_merge($parameters, $this->parameters);

        return $this;
    }

    /**
     * This method will fill parameters property
     *
     * @param string $name  The name of parameter
     * @param string $value The value of parameter
     *
     * @return MessageFormatter
     */
    public function addParameter(string $name, string $value)
    {
        $this->parameters[$name] = $value;

        return $this;
    }

    /**
     * Set buttonText property
     *
     * @param string $buttonText The text of button
     *
     * @return MessageFormatter
     */
    public function setButtonText(string $buttonText)
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    /**
     * This method will return a formatted message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return
            "<h3>" . $this->header . "</h3><br>"
            . $this->body
            . "<br><br>"
            . "<div class='text-center action-buttons-container'>"
            . "<a class='button primary' href='"
            . route($this->route, $this->parameters)
            . "'>"
            . $this->buttonText
            . "</a>"
            . "</div>";
    }
}