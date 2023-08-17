<?php
namespace Mezon\Gentella\Views;

use Mezon\HtmlTemplate\HtmlTemplate;

/**
 * Class Registration
 *
 * @package Gentella
 * @subpackage Registration
 * @author Dodonov A.A.
 * @version v.1.0 (2020/08/27)
 * @copyright Copyright (c) 2020, http://aeon.su
 */

/**
 * View class
 */
class Registration extends GentellaView
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
}
