<?php

use Mezon\Gentella\Views\Registration;
use Mezon\Gentella\GentellaTemplate;

class RegistrationUnitTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Testing constructor
     */
    public function testConstructor() : void
    {
        // setup
        $template = new GentellaTemplate();
        $view = new Registration($template);

        // test body
        $result = $view->render();

        // assertions
        $this->assertStringContainsString("<h1>Регистрация</h1>", $result);
    }
}
