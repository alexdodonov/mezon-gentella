<?php
namespace Mezon\Gentella\Tests\Selenium;

use Mezon\Selenium\PersistentTools;
use Facebook\WebDriver\WebDriverBy;

class LoginTest extends PersistentTools
{
    
    use LoginLogoutTrait;

    /**
     * Testing login
     */
    public function testLogin(): void
    {
        // setup and test body and assertions
        $this->requireLoggedIn('ad@angift.ru', 'root');
    }

    /**
     * Testing logout
     */
    public function testLogout(): void
    {
        // setup
        $this->requireLoggedIn('ad@angift.ru', 'root');

        // test body and assertions
        $this->requireLoggedOut();
    }
}
