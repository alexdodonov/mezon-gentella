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
 * @copyright Copyright (c) 2019, http://aeon.su
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
                'icon' => Conf::getConfigValueAsString('template/mezon-gentelella-icon', 'fa-paw'),
                'show-registration-link' => Conf::getConfigValueAsString('template/show-registration-link'),
                'show-restore-password-link' => Conf::getConfigValueAsString('template/show-restore-password-link'),
                'favicon-path' => Conf::getConfigValueAsString('template/favicon-path', '/res/images/favicon.ico'),
                'mezon-gentelella-http-path' => Conf::getConfigValueAsString(
                    'template/mezon-gentelella-http-path',
                    '/vendor/mezon/gentella/Mezon/Gentella')
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
    private static function getMessageContent(string $msgType, string $message): string
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
     * @deprecated
     * @codeCoverageIgnore
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
     * @deprecated
     * @codeCoverageIgnore
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
     * @deprecated
     * @codeCoverageIgnore
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
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function dangerMessageContent(string $message): string
    {
        return self::getMessageContent('alert-danger', $message);
    }

    /**
     * Method sets success action message
     *
     * @param string $successMessage
     *            success message
     * @return string compiled success message
     */
    protected function getSuccessMessageContent(string $successMessage): string
    {
        return self::getMessageContent('alert-success', $successMessage);
    }

    /**
     * Method sets error action message
     *
     * @param string $errorMessage
     *            error meddage
     * @return string compiled error message
     */
    protected function getErrorMessageContent(string $errorMessage): string
    {
        return self::getMessageContent('alert-danger', $errorMessage);
    }
}
