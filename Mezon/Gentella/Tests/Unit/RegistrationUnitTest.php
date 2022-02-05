<?php
namespace Mezon\Gentella\Tests\Unit;

use Mezon\Gentella\Views\Registration;
use Mezon\Gentella\GentellaTemplate;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class RegistrationUnitTest extends ViewTestBase
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
    protected function assertRegistrationOutput(string $result, string $message = '', string $messageType = 'danger'): void
    {
        $this->assertOutput($result, 'Регистрация', $message, $messageType);
    }

    /**
     * Data provider for the testConstructor
     *
     * @return array testing data
     */
    public function registrationDataProvider(): array
    {
        return [
            [
                '',
                function (string $result) {
                    $this->assertRegistrationOutput($result);
                }
            ],
            [
                'passwords-not-match',
                function (string $result) {
                    $this->assertRegistrationOutput($result, 'Пароли должны совпадать');
                }
            ],
            [
                'user-exists',
                function (string $result) {
                    $this->assertRegistrationOutput($result, 'Пользователь существует');
                }
            ],
            [
                'all-fields-must-be-filled',
                function (string $result) {
                    $this->assertRegistrationOutput($result, 'Все поля должны быть заполнены');
                }
            ],
            [
                'user-was-created-authorize',
                function (string $result) {
                    $this->assertRegistrationOutput(
                        $result,
                        'Регистрация прошла успешно. Теперь Вы можете авторизоваться',
                        'success');
                }
            ],
            [
                'invalid-login-was-submitted-wile-registration',
                function (string $result) {
                    $this->assertRegistrationOutput(
                        $result,
                        'В качество логина можно использовать только email или телефон');
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
        $template->addPaths([
            __DIR__ . '/../../Res/'
        ]);

        $view = new Registration($template);
        if ($message === 'user-was-created-authorize') {
            $view->setSuccessMessage($message);
        } else {
            $view->setErrorMessage($message);
        }

        // test body
        $result = $view->render();

        // assertions
        $assert($result);
    }
}
