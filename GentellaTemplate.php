<?php
namespace Mezon\Gentella;

/**
 * Class GentellaTemplate
 *
 * @package Mezon
 * @subpackage GentellaTemplate
 * @author Dodonov A.A.
 * @version v.1.0 (2019/08/17)
 * @copyright Copyright (c) 2019, aeon.org
 */

/**
 * Template class
 */
class GentellaTemplate extends \Mezon\HtmlTemplate\HtmlTemplate
{

    /**
     * Template сonstructor
     *
     * @param string $template
     *            Page layout
     */
    public function __construct(string $template = 'index')
    {
        parent::__construct(dirname(__FILE__), $template);

        $this->setPageVar('action', '');
    }

    /**
     * Compilation of the message
     *
     * @param string $msgType
     *            Type of the message
     * @param string $message
     *            Message
     * @return string Message block markup
     */
    protected static function getMessageContent(string $msgType, string $message): string
    {
        $content = '<div class="x_content" style="margin: 0; padding: 0;">';
        $content .= '<div class="alert ' . $msgType . ' alert-dismissible fade in" role="alert">';
        $content .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $content .= '<span aria-hidden="true">×</span></button>' . $message . '</div></div>';

        return $content;
    }

    /**
     * Method compiles success message content
     *
     * @param string $message
     *            Message to be compiled
     */
    public static function successMessageContent(string $message): string
    {
        return self::getMessageContent('alert-success', $message);
    }

    /**
     * Method compiles info message content
     *
     * @param string $message
     *            Message to be compiled
     */
    public static function infoMessageContent(string $message): string
    {
        return self::getMessageContent('alert-info', $message);
    }

    /**
     * Method compiles warning message content
     *
     * @param string $message
     *            Message to be compiled
     */
    public static function warningMessageContent(string $message): string
    {
        return self::getMessageContent('alert-warning', $message);
    }

    /**
     * Method compiles danger message content
     *
     * @param string $message
     *            Message to be compiled
     */
    public static function dangerMessageContent(string $message): string
    {
        return self::getMessageContent('alert-danger', $message);
    }
}
