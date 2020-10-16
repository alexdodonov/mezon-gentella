<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Application\ViewStatic;
use Mezon\Gentella\GentellaTemplate;

/**
 * Class PasswordRestoration
 *
 * @package Gentella
 * @subpackage Registration
 * @author Dodonov A.A.
 * @version v.1.0 (2020/08/27)
 * @copyright Copyright (c) 2020, aeon.org
 */

/**
 * View class
 */
class PasswordRestoration extends ViewStatic
{

    /**
     * Constructor
     *
     * @param HtmlTemplate $template
     *            template
     * @param string $blockName
     *            View's block name to be rendered
     */
    public function __construct(HtmlTemplate $template)
    {
        parent::__construct($template, 'password-restoration');
    }

    /**
     *
     * {@inheritdoc}
     * @see \Mezon\Application\ViewBase::setErrorMessage()
     */
    public function setErrorMessage($errorMessage): void
    {
        parent::setErrorMessage($errorMessage);

        switch ($errorMessage) {
            case ('user-does-not-exist'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Пользователь не существует'));
                break;
            case ('email-not-set'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Заполните поле "Email"!'));
                break;
            case ('check-your-email'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::successMessageContent('Проверьте свою почту!'));
                break;
            default:
                break;
        }
    }
}
