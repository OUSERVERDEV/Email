<?php

namespace Alexlbr\EmailLibrary\Mailer;

use Alexlbr\EmailLibrary\EmailInterface;

/**
 * Interface MailerInterface.
 */
interface MailerInterface
{
    /**
     * @param EmailInterface $email
     *
     * @throws MailerException
     */
    public function send(EmailInterface $email);
}
