<?php

namespace Email\Mailer;

use Email\EmailInterface;

/**
 * Interface MailerInterface.
 */
interface MailerInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $options
     */
    public function send(EmailInterface $email, array $options);
}
