<?php
namespace Mezon\Gentella\Tests\Selenium;

use Mezon\Selenium\PersistentTools;
use Mezon\PdoCrud\ConnectionTrait;
use Mezon\Conf\Conf;

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

        $this->getConnection()->prepare('DELETE FROM user WHERE login LIKE :login');
        $this->getConnection()->bindParameter(':login', 'testing@localhost');
        $this->getConnection()->execute();
    }

    /**
     * Testing user registration
     */
    public function testRegisterUser(): void
    {
        // setup
        $this->waitForPageLoad(Conf::getConfigValue('registration-url'));

        // test body
        $this->inputIn('input[name=login]', 'testing@localhost');
        $this->inputIn('input[name=password]', 'abc112233');
        $this->inputIn('input[name=password-confirmation]', 'abc112233');
        $this->clickElement('a.btn-default');

        // assertions
        $this->waitForVisibilityBySelector('div.alert-success');
        $this->requireLoggedIn('testing@localhost', 'abc112233');
    }
}
