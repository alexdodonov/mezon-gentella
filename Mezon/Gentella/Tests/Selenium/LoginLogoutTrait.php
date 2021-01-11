<?php
namespace Mezon\Gentella\Tests\Selenium;

trait LoginLogoutTrait
{
    
    /**
     * Login URL
     * 
     * @var string
     */
    public static $loginUrl = '';

    /**
     * Method authorizes user
     *
     * @param string $login
     *            user login
     * @param string $password
     *            user password
     */
    private function requireLoggedIn(string $login, string $password): void
    {
        $this->waitForPageLoad(self::$loginUrl);

        if ($this->elementExists('img.profile_img')) {
            // we are already authorized
            return;
        }

        $this->waitForVisibilityBySelector('input[name=login]');

        $this->inputIn('input[name=login]', $login);
        $this->inputIn('input[name=password]', $password);
        $this->clickElement('a.btn-default');

        $this->waitForVisibilityBySelector('img.profile_img');
    }

    /**
     * Method forces user to logout
     */
    private function requireLoggedOut(): void
    {
        if ($this->elementExists('input[name=login]')) {
            // we are already logged out
            return;
        }

        $this->clickElement('.user-profile');

        $this->waitForVisibilityBySelector('.dropdown-item');

        $this->clickElement('.dropdown-item');

        $this->waitForVisibilityBySelector('input[name=login]');
    }
}
