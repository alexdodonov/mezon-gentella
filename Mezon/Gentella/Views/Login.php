<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Application\ViewStatic;
use Mezon\Gentella\GentellaTemplate;

/**
 * Class Login
 *
 * @package Gentella
 * @subpackage Login
 * @author Dodonov A.A.
 * @version v.1.0 (2020/08/27)
 * @copyright Copyright (c) 2020, aeon.org
 */

/**
 * View class
 */
class Login extends ViewStatic
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
        parent::__construct($template, 'login');
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
            case ('user-does-not-exists'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Пользователь не существует'));
                break;
            case ('invalid-password'):
                $this->getTemplate()->setPageVar(
                'message',
                GentellaTemplate::dangerMessageContent('Неправильный пароль'));
                break;
            case ('all-fields-must-be-filled'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Все поля должны быть заполнены'));
                break;
            default:
                break;
        }
    }
}
