<?php
namespace Mezon\Gentella\Views;

use Mezon\ViewStatic;
use Mezon\ViewBase;

/**
 * Base class for all Gentella views
 *
 * @package Gentella
 * @subpackage GentellaView
 * @author Dodonov A.A.
 * @version v.1.0 (2022/02/05)
 * @copyright Copyright (c) 2022, http://aeon.su
 */

/**
 * View class
 */
class GentellaView extends ViewStatic
{

    /**
     *
     * {@inheritdoc}
     * @see ViewBase::setErrorMessage()
     */
    public function setErrorMessage(string $errorMessage): void
    {
        switch ($errorMessage) {
            case (''):
                break;
            default:
                $this->getTemplate()->setErrorMessage($errorMessage);
                break;
        }
    }

    /**
     *
     * {@inheritdoc}
     * @see ViewBase::setErrorMessage()
     */
    public function setSuccessMessage(string $successMessage): void
    {
        $this->getTemplate()->setSuccessMessage($successMessage);
    }
}
