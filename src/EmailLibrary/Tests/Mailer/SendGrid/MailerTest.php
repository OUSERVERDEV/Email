<?php

namespace Alexlbr\EmailLibrary\Tests\Mailer\SendGrid;

use Alexlbr\EmailLibrary\Mailer\SendGrid\Mailer;

class MailerTest extends \PHPUnit_Framework_TestCase
{
    public function testSendSendGridDecoratorEmail()
    {
        $emailDecorator = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\EmailDecorator')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGrid = $this->getMockBuilder('\SendGrid')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridEmail = $this->getMockBuilder('\SendGrid\Email')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridEmailFactory = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\SendGridEmailFactory')
            ->getMock();

        $sendGridEmailFactory->method('createSendGridEmail')
            ->willReturn($sendGridEmail);

        $mailer = new Mailer($sendGridEmailFactory, $sendGrid);
        $mailer->send($emailDecorator);
    }

    public function testSendGenericEmail()
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
        $mailer->send($email);
    }
}
