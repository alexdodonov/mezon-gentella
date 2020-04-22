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

        $this->setPageVars(
            [
                'action' => '',
                'show-registration-link' => \Mezon\Conf\Conf::getConfigValue('template/show-registration-link', 1),
                'show-restore-password-link' => \Mezon\Conf\Conf::getConfigValue(
                    'template/show-restore-password-link',
                    1),
                'favicon-path' => \Mezon\Conf\Conf::getConfigValue('template/favicon-path', '/res/images/favicon.ico')
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
        return \Mezon\TemplateEngine\TemplateEngine::printRecord(
            file_get_contents(__DIR__ . '/res/templates/message.tpl'),
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
