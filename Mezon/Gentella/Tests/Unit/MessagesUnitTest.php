<?php
namespace Mezon\Gentella\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Mezon\Gentella\GentellaTemplate;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class MessagesUnitTest extends TestCase
{

    /**
     * Testing message content
     */
    public function testSuccessMessageContent(): void
    {
        // setup
        $template = new GentellaTemplate();
        $template->addPaths([
            __DIR__ . '/../../../../vendor/mezon/html-template/Mezon/HtmlTemplate/Tests/TestData'
        ]);

        // test body
        $template->setSuccessMessage('success');

        // assertions
        $this->assertStringContainsString('alert-success', (string) $template->getPageVar('action-message'));
    }

    /**
     * Testing message content
     */
    public function testDangerMessageContent(): void
    {
        // setup
        $template = new GentellaTemplate();
        $template->addPaths([
            __DIR__ . '/../../../../vendor/mezon/html-template/Mezon/HtmlTemplate/Tests/TestData'
        ]);

        // test body
        $template->setErrorMessage('error');

        // assertions
        $this->assertStringContainsString('alert-danger', (string) $template->getPageVar('action-message'));
    }
}
