<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\ViewStatic;
use Mezon\ViewBase;

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

        switch ($errorMessage) {
            case ('passwords-not-match'):
            case ('user-exists'):
            case ('all-fields-must-be-filled'):
            case ('invalid-login-was-submitted-wile-registration'):
                $this->getTemplate()->setErrorMessage($errorMessage);
                break;
            case ('user-was-created-authorize'):
                $this->getTemplate()->setSuccessMessage($errorMessage);
                break;
            default:
                break;
        }
    }
}
