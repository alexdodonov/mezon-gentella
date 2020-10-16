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
class PasswordRestorationComplete extends ViewStatic
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
        parent::__construct($template, 'password-restoration-complete');
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
            case ('token-outdated'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::dangerMessageContent(
                        'Токен просрочен. Запросите восстановление пароля ещё раз и дождитесь письма с инструкциями по восстановлению пароля.'));
                break;
            case ('check-your-email'):
                $this->getTemplate()->setPageVar(
                    'message',
                    GentellaTemplate::successMessageContent('Ваш новый пароль придёт Вам на почту!'));
                break;
            default:
                break;
        }
    }
}
