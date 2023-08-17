<?php
namespace Mezon\Gentella\Tests\Selenium;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
trait Utilities
{

    /**
     * Method asserts error message output
     *
     * @param string $expected
     *            message text
     * @param string $messageType
     *            message type
     */
    public function assertMessage(string $expected, string $messageType): void
    {
        // TODO add abstract methods
        $this->waitForVisibilityBySelector('div.alert-' . $messageType);

        // TODO add abstract methods
        $message = $this->getTagContent('div.alert-' . $messageType);
        $message = trim($message, '×');
        $message = trim($message);

        // TODO add abstract methods
        $this->assertEquals($expected, $message);
    }

    /**
     * Assert success message
     *
     * @param string $message
     *            success message
     */
    public function assertSuccessMessage(string $message): void
    {
        $this->assertMessage($message, 'success');
    }

    /**
     * Assert error message
     *
     * @param string $message
     *            error message
     */
    public function assertErrorMessage(string $message): void
    {
        $this->assertMessage($message, 'danger');
    }
}
