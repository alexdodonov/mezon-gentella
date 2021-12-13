<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\ViewStatic;
use Mezon\ViewBase;

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
     * @see ViewBase::setErrorMessage()
     */
    public function setErrorMessage(string $errorMessage): void
    {
        parent::setErrorMessage($errorMessage);

        switch ($errorMessage) {
            case ('user-does-not-exist'):
            case ('email-not-set'):
                $this->getTemplate()->setErrorMessage($errorMessage);
                break;
            case ('check-your-email'):
                $this->getTemplate()->setSuccessMessage($errorMessage);
                break;
            default:
                break;
        }
    }
}
