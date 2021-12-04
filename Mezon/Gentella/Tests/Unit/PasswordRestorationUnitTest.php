<?php
namespace Mezon\Gentella\Tests\Unit;

use Mezon\Gentella\GentellaTemplate;
use Mezon\Gentella\Views\PasswordRestoration;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class PasswordRestorationUnitTest extends ViewTestBase
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
    protected function assertPasswordRestorationOutput(
        string $result,
        string $message = '',
        string $messageType = 'danger'): void
    {
        $this->assertOutput($result, 'Восстановление<br>пароля', $message, $messageType);
    }

    /**
     * Data provider for testConstructor
     *
     * @return array testing data
     */
    public function passwordRestorationDataProvider(): array
    {
        return [
            [
                '',
                function (string $result) {
                    $this->assertPasswordRestorationOutput($result);
                }
            ],
            [
                'user-does-not-exist',
                function (string $result) {
                    $this->assertPasswordRestorationOutput($result, 'Пользователь не существует');
                }
            ],
            [
                'email-not-set',
                function (string $result) {
                    $this->assertPasswordRestorationOutput($result, 'Заполните поле "Email"!');
                }
            ],
            [
                'check-your-email',
                function (string $result) {
                    $this->assertPasswordRestorationOutput($result, 'Проверьте свою почту!', 'success');
                }
            ]
        ];
    }

    /**
     * Testing constructor
     *
     * @dataProvider passwordRestorationDataProvider
     */
    public function testConstructor(string $message, callable $assert): void
    {
        // setup
        $template = new GentellaTemplate();
        $template->addPaths([
            __DIR__ . '/../../Res/'
        ]);

        $view = new PasswordRestoration($template);
        $view->setErrorMessage($message);

        // test body
        $result = $view->render();

        // assertions
        $assert($result);
    }
}
