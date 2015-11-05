<?php

namespace Email\Mailer\SendGrid;

use Email\EmailInterface;

interface SendGridEmailFactoryInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $options
     *
     * @return mixed
     */
    public function getSendGridEmail(EmailInterface $email, array $options);
}
