<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid\Factory;

use Alexlbr\EmailLibrary\EmailInterface;
use SendGrid\Email;

interface SendGridEmailFactoryInterface
{
    /**
     * @param EmailInterface $email
     *
     * @return Email
     */
    public function createSendGridEmail(EmailInterface $email);
}
