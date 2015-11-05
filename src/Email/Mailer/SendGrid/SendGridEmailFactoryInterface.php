<?php

namespace Email\Mailer\SendGrid;

use Email\EmailInterface;
use SendGrid\Email;

interface SendGridEmailFactoryInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $options
     *
     * @return Email
     */
    public function createSendGridEmail(EmailInterface $email, array $options);
}
