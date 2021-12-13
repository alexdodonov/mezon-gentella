<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;
use Mezon\ViewStatic;
use Mezon\ViewBase;

// TODO use 403 template for CabApplication::403 page

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
     * @see ViewBase::setErrorMessage()
     */
    public function setErrorMessage(string $errorMessage): void
    {
        parent::setErrorMessage($errorMessage);

        switch ($errorMessage) {
            case ('user-does-not-exist'):
            case ('invalid-password'):
            case ('all-fields-must-be-filled'):
                $this->getTemplate()->setErrorMessage($errorMessage);
                break;
            default:
                break;
        }
    }
}
