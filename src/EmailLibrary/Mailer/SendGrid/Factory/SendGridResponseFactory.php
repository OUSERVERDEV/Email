<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid\Factory;

use Alexlbr\EmailLibrary\Mailer\MailerResponse;
use Alexlbr\EmailLibrary\Mailer\SendGrid\Response;
use SendGrid\Response as SendGridResponse;

class SendGridResponseFactory implements SendGridResponseFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createMailerResponse(SendGridResponse $sendGridResponse)
    {
        $mailerResponse = new MailerResponse(
            $sendGridResponse->getCode(),
            $sendGridResponse->getHeaders(),
            $sendGridResponse->getBody()
        );

        return $mailerResponse;
    }
}
