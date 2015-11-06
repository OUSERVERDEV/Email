<?php

namespace Alexlbr\EmailLibrary\Mailer;

use Alexlbr\EmailLibrary\EmailInterface;
use Alexlbr\EmailLibrary\Mailer\MailerException;

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
