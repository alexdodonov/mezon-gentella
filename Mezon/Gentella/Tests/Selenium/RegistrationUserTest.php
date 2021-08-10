<?php
namespace Mezon\Gentella\Tests\Selenium;

use Mezon\Selenium\PersistentTools;
use Mezon\PdoCrud\ConnectionTrait;
use Mezon\Conf\Conf;
use Enterprize\Auth\AuthModel;

class RegistrationUserTest extends PersistentTools
{

    use ConnectionTrait, LoginLogoutTrait;

    /**
     *
     * {@inheritdoc}
     * @see \Mezon\Selenium\PersistentTools::setUp()
     */
    public function setUp(): void
    {
        parent::setUp();

        $authModel = new AuthModel();
        if ($authModel->userWithLoginExists('testing@localhost.ru')) {
            $authModel->deleteUserByLogin('testing@localhost.ru');
        }
    }

    /**
     * Testing user registration
     */
    public function testRegisterUser(): void
    {
        // setup
        $this->waitForPageLoad(Conf::getConfigValue('registration-url'));

        // test body
        $this->inputIn('input[name=login]', 'testing@localhost.ru');
        $this->inputIn('input[name=password]', 'abc112233');
        $this->inputIn('input[name=password-confirmation]', 'abc112233');
        $this->clickElement('a.btn-default');

        // assertions
        $this->waitForVisibilityBySelector('div.alert-success');
        $this->requireLoggedIn('testing@localhost.ru', 'abc112233');
    }
}
