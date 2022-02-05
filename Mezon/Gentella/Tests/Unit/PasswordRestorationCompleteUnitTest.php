<?php
namespace Mezon\Gentella\Tests\Unit;

use Mezon\Gentella\GentellaTemplate;
use Mezon\Gentella\Views\PasswordRestorationComplete;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class PasswordRestorationCompleteUnitTest extends ViewTestBase
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
    protected function assertPasswordRestorationCompleteOutput(
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
    public function passwordRestorationCompleteDataProvider(): array
    {
        return [
            [
                '',
                function (string $result) {
                    $this->assertPasswordRestorationCompleteOutput($result);
                }
            ],
            [
                'token-not-found',
                function (string $result) {
                    $this->assertPasswordRestorationCompleteOutput($result, 'Токен не найден');
                }
            ],
            [
                'token-not-set',
                function (string $result) {
                    $this->assertPasswordRestorationCompleteOutput($result, 'Токен не указан');
                }
            ],
            [
                'check-your-email-for-new-password',
                function (string $result) {
                    $this->assertPasswordRestorationCompleteOutput(
                        $result,
                        'Ваш новый пароль придёт Вам на почту!',
                        'success');
                }
            ]
        ];
    }

    /**
     * Testing constructor
     *
     * @dataProvider passwordRestorationCompleteDataProvider
     */
    public function testConstructor(string $message, callable $assert): void
    {
        // setup
        $template = new GentellaTemplate();
        $template->addPaths([
            __DIR__ . '/../../Res/'
        ]);

        $view = new PasswordRestorationComplete($template);
        if ($message === 'check-your-email-for-new-password') {
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
