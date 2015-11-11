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

        $sendGridResponse = $this->getMockBuilder('SendGrid\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGrid->method('send')
            ->willReturn($sendGridResponse);

        $sendGridEmail = $this->getMockBuilder('\SendGrid\Email')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridEmailFactory = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\Factory\SendGridEmailFactory')
            ->getMock();

        $sendGridEmailFactory->method('createSendGridEmail')
            ->willReturn($sendGridEmail);

        $sendGridResponseFactory = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\Factory\SendGridResponseFactory')
            ->disableOriginalConstructor()
            ->getMock();

        $mailerResponse = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\MailerResponse')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridResponseFactory->method('createMailerResponse')
            ->willReturn($mailerResponse);

        $mailer = new Mailer($sendGridEmailFactory, $sendGrid, $sendGridResponseFactory);
        $mailer->send($emailDecorator);
    }

    public function testSendGenericEmail()
    {
        $sendGridEmail = $this->getMockBuilder('\SendGrid\Email')
            ->getMock();

        $sendGrid = $this->getMockBuilder('\SendGrid')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridResponse = $this->getMockBuilder('SendGrid\Response')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGrid->method('send')
            ->willReturn($sendGridResponse);

        $sendGridEmailFactory = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\Factory\SendGridEmailFactory')
            ->getMock();

        $sendGridEmailFactory->method('createSendGridEmail')
            ->willReturn($sendGridEmail);

        $email = $this->getMockBuilder('\Alexlbr\EmailLibrary\Email')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridResponseFactory = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\SendGrid\Factory\SendGridResponseFactory')
            ->disableOriginalConstructor()
            ->getMock();

        $mailerResponse = $this->getMockBuilder('\Alexlbr\EmailLibrary\Mailer\MailerResponse')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridResponseFactory->method('createMailerResponse')
            ->willReturn($mailerResponse);

        $mailer = new Mailer($sendGridEmailFactory, $sendGrid, $sendGridResponseFactory);
        $mailer->send($email);
    }
}
