<?php

namespace Email\Mailer;

use Email\EmailInterface;
use Email\Mailer\MailerException;

/**
 * Interface MailerInterface.
 */
interface MailerInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $options
     *
     * @throws MailerException
     */
    public function send(EmailInterface $email, array $options);
}
