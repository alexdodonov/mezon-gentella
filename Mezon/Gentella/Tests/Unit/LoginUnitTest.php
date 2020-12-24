<?php
namespace Mezon\Gentella\Tests\Unit;

use Mezon\Gentella\Views\Login;
use Mezon\Gentella\GentellaTemplate;

class LoginUnitTest extends ViewTestBase
{

    /**
     * Method asserts output
     *
     * @param string $result
     *            result of the view generation
     * @param string $message
     *            outputted message
     * @param string $messageType
     *            message type
     */
    protected function assertLoginOutput(string $result, string $message = '', string $messageType = 'danger'): void
    {
        $this->assertOutput($result, 'Вход в систему', $message, $messageType);
    }

    /**
     * Data provider for the testConstructor
     *
     * @return array testing data
     */
    public function loginDataProvider(): array
    {
        return [
            [
                '',
                function (string $result) {
                    $this->assertLoginOutput($result);
                }
            ],
            [
                'user-does-not-exist',
                function (string $result) {
                    $this->assertLoginOutput($result, 'Пользователь не существует');
                }
            ],
            [
                'invalid-password',
                function (string $result) {
                    $this->assertLoginOutput($result, 'Неправильный пароль');
                }
            ],
            [
                'all-fields-must-be-filled',
                function (string $result) {
                    $this->assertLoginOutput($result, 'Все поля должны быть заполнены');
                }
            ]
        ];
    }

    /**
     * Testing constructor
     *
     * @dataProvider loginDataProvider
     */
    public function testConstructor(string $message, callable $assert): void
    {
        // setup
        $template = new GentellaTemplate();
        $view = new Login($template);
        $view->setErrorMessage($message);

        // test body
        $result = $view->render();

        // assertions
        $assert($result);
    }
}
