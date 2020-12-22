<?php
namespace Mezon\Gentella;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Conf\Conf;
use Mezon\TemplateEngine\TemplateEngine;

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
class GentellaTemplate extends HtmlTemplate
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

        $this->setPageVars(
            [
                'action' => '',
                'show-registration-link' => Conf::getConfigValue('template/show-registration-link', 1),
                'show-restore-password-link' => Conf::getConfigValue('template/show-restore-password-link', 1),
                'favicon-path' => Conf::getConfigValue('template/favicon-path', '/res/images/favicon.ico'),
                'mezon-gentelella-http-path' => Conf::getConfigValue(
                    'template/mezon-gentelella-http-path',
                    '/vendor/mezon/gentella/Mezon/Gentella'),
            ]);
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
        return TemplateEngine::printRecord(
            file_get_contents(__DIR__ . '/Res/Templates/message.tpl'),
            [
                'type' => $msgType,
                'message' => $message
            ]);
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
