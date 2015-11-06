<?php

namespace Alexlbr\EmailLibrary\Tests\Mailer\SendGrid;

use Alexlbr\EmailLibrary\Mailer\SendGrid\SendGridEmailFactory;

class SendGridEmailFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSendGridEmailByEmailInterface()
    {
        $email = $this->getMockBuilder('\Alexlbr\EmailLibrary\Email')
            ->disableOriginalConstructor()
            ->getMock();

        $sendGridEmailFactory = new SendGridEmailFactory();
        $sendGridEmailFactory->createSendGridEmail($email, array());
    }
}
