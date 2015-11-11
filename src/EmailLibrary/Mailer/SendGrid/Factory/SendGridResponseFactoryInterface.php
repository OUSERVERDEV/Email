<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid\Factory;

use Alexlbr\EmailLibrary\Mailer\MailerResponseInterface;
use SendGrid\Response as SendGridResponse;

interface SendGridResponseFactoryInterface
{
    /**
     * @param SendGridResponse $response
     *
     * @return MailerResponseInterface
     */
    public function createMailerResponse(SendGridResponse $response);
}
