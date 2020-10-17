<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\Application\ViewStatic;
use Mezon\Gentella\GentellaTemplate;

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
     * @see \Mezon\Application\ViewBase::setErrorMessage()
     */
    public function setErrorMessage($errorMessage): void
    {
        parent::setErrorMessage($errorMessage);

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
