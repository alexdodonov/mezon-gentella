<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;

// TODO use 403 template for CabApplication::403 page

/**
 * Class Login
 *
 * @package Gentella
 * @subpackage Login
 * @author Dodonov A.A.
 * @version v.1.0 (2020/08/27)
 * @copyright Copyright (c) 2020, http://aeon.su
 */

/**
 * View class
 */
class Login extends GentellaView
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
}
