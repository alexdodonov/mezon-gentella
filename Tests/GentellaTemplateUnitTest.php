<?php

class GentellaTemplateUnitTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Testing message content.
     */
    public function testSuccessMessageContent()
    {
        $str1 = \Mezon\Gentella\GentellaTemplate::successMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-success alert-dismissible fade in" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing message content.
     */
    public function testWarningMessageContent()
    {
        $str1 = \Mezon\Gentella\GentellaTemplate::warningMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-warning alert-dismissible fade in" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing message content.
     */
    public function testInfoMessageContent()
    {
        $str1 = \Mezon\Gentella\GentellaTemplate::infoMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-info alert-dismissible fade in" role="alert">' .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' .
            '<span aria-hidden="true">×</span></button>msg</div></div>';

        $this->assertEquals($str1, $str2, 'Invalid HTML');
    }

    /**
     * Testing message content.
     */
    public function testDangerMessageContent()
    {
        $str1 = \Mezon\Gentella\GentellaTemplate::dangerMessageContent('msg');
        $str2 = '<div class="x_content" style="margin: 0; padding: 0;">' .
            '<div class="alert alert-danger alert-dismissible fade in" role="alert">' .
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
        $template = new \Mezon\Gentella\GentellaTemplate();

        // assertions
        $this->assertEquals('', $template->getPageVar('action'));
        $this->assertEquals(1, $template->getPageVar('show-registration-link'));
        $this->assertEquals(1, $template->getPageVar('show-restore-password-link'));
    }
}
