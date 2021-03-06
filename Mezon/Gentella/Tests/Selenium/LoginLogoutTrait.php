<?php
namespace Mezon\Gentella\Tests\Selenium;

use Mezon\Conf\Conf;

trait LoginLogoutTrait
{

    /**
     * Method authorizes user
     *
     * @param string $login
     *            user login
     * @param string $password
     *            user password
     */
    protected function requireLoggedIn(string $login, string $password): void
    {
        $this->waitForPageLoad(Conf::getConfigValue('login-url'));

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
    protected function requireLoggedOut(): void
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
