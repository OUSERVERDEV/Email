<?php

namespace Alexlbr\EmailLibrary\Tests\Mailer\SendGrid;

use Alexlbr\EmailLibrary\Mailer\SendGrid\Mailer;

class MailerTest extends \PHPUnit_Framework_TestCase
{
    public function testSend()
    {
        $sendGridEmail = $this->getMockBuilder('\SendGrid\Email')
            ->getMock();

        $sendGridEmailFactory = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\SendGridEmailFactory')
            ->getMock();

        $sendGridEmailFactory->method('createSendGridEmail')
            ->willReturn($sendGridEmail);

        $sendGrid = $this->getMockBuilder('\SendGrid')
            ->disableOriginalConstructor()
            ->getMock();

        $email = $this->getMockBuilder('\Alexlbr\EmailLibrary\Email')
            ->disableOriginalConstructor()
            ->getMock();

        $mailer = new Mailer($sendGridEmailFactory, $sendGrid);
        $mailer->send($email, array());
    }
}
