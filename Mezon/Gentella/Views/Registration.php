<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Application\ViewStatic;
use Mezon\Gentella\GentellaTemplate;
use Mezon\Application\ViewBase;

/**
 * Class Registration
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
class Registration extends ViewStatic
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
        parent::__construct($template, 'registration');
    }

    /**
     *
     * {@inheritdoc}
     * @see ViewBase::setErrorMessage()
     */
    public function setErrorMessage(string $errorMessage): void
    {
        parent::setErrorMessage($errorMessage);

        // TODO store strings in text files error-messages.json, success-messages.json, or look ...
        // in what files CommonApplication stores it and may be int this place we shoud use these files
        switch ($errorMessage) {
            case ('passwords-not-match'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Пароли должны совпадать'));
                break;
            case ('user-exists'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Пользователь существует'));
                break;
            case ('all-fields-must-be-filled'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent('Все поля должны быть заполнены'));
                break;
            case ('invalid-login-was-submitted-wile-registration'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent(
                        'В качество логина можно использовать только email или телефон'));
                break;
            case ('user-was-created-authorize'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::successMessageContent(
                        'Регистрация прошла успешно. Теперь Вы можете авторизоваться'));
                break;
            default:
                break;
        }
    }
}
