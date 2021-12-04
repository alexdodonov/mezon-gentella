<?php
namespace Mezon\Gentella\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Mezon\Gentella\GentellaTemplate;

/**
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ConstructorUnitTest extends TestCase
{

    /**
     * Testing constructor
     */
    public function testConstruct(): void
    {
        // setup and test body
        $template = new GentellaTemplate();

        // assertions
        $this->assertEquals('', $template->getPageVar('action'));
        $this->assertEquals('', $template->getPageVar('show-registration-link'));
        $this->assertEquals('', $template->getPageVar('show-restore-password-link'));
    }
}
