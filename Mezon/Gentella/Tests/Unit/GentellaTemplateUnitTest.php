<?php
namespace Mezon\Gentella\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Mezon\Gentella\GentellaTemplate;

class GentellaTemplateUnitTest extends TestCase
{

    /**
     * Testing message content.
     */
    public function testSuccessMessageContent()
    {
        $str1 = GentellaTemplate::successMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-success alert-dismissible fade in show" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing message content.
     */
    public function testWarningMessageContent()
    {
        $str1 = GentellaTemplate::warningMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-warning alert-dismissible fade in show" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing message content.
     */
    public function testInfoMessageContent()
    {
        $str1 = GentellaTemplate::infoMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-info alert-dismissible fade in show" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing message content.
     */
    public function testDangerMessageContent()
    {
        $str1 = GentellaTemplate::dangerMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-danger alert-dismissible fade in show" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing constructor
     */
    public function testConstruct(): void
    {
        // setup and test body
        $template = new GentellaTemplate();

        // assertions
        $this->assertEquals('', $template->getPageVar('action'));
        $this->assertEquals(1, $template->getPageVar('show-registration-link'));
        $this->assertEquals(1, $template->getPageVar('show-restore-password-link'));
    }
}
