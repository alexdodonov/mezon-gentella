<?php
namespace Mezon\Gentella\Tests\Unit;

use PHPUnit\Framework\TestCase;

/**
 * 
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ViewTestBase extends TestCase
{

    /**
     * Method asserts output
     *
     * @param string $result
     *            result of the view generation
     * @param string $title
     *            view title
     * @param string $message
     *            outputted message
     * @param string $messageType
     *            message type
     */
    protected function assertOutput(string $result, string $title, string $message = '', string $messageType = 'danger'): void
    {
        $this->assertStringContainsString('<h1>' . $title . '</h1>', $result);

        if ($message !== '') {
            $this->assertStringContainsString($message, $result);
            $this->assertStringContainsString('<div class="alert alert-' . $messageType, $result);
        }
    }
}
