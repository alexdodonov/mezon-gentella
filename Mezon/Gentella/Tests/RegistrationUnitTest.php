<?php
namespace Mezon\Gentella\Tests;

use Mezon\Gentella\Views\Registration;
use Mezon\Gentella\GentellaTemplate;

class RegistrationUnitTest extends \PHPUnit\Framework\TestCase
{

    public function registrationDataProvider(): array
    {
        return [
            [
                '',
                function (string $result) {
                    $this->assertStringContainsString('<h1>Регистрация</h1>', $result);
                }
            ],
            [
                'passwords-not-match',
                function (string $result) {
                    $this->assertStringContainsString('<h1>Регистрация</h1>', $result);
                    $this->assertStringContainsString('Пароли должны совпадать', $result);
                    $this->assertStringContainsString('<div class="alert alert-danger', $result);
                }
            ],
            [
                'user-exists',
                function (string $result) {
                    $this->assertStringContainsString('<h1>Регистрация</h1>', $result);
                    $this->assertStringContainsString('Пользователь существует', $result);
                    $this->assertStringContainsString('<div class="alert alert-danger', $result);
                }
            ]
        ];
    }

    /**
     * Testing constructor
     *
     * @dataProvider registrationDataProvider
     */
    public function testConstructor(string $message, callable $assert): void
    {
        // setup
        $template = new GentellaTemplate();
        $view = new Registration($template);
        $view->setErrorMessage($message);

        // test body
        $result = $view->render();

        // assertions
        $assert($result);
    }
}
