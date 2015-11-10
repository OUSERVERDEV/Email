<?php

namespace Alexlbr\EmailLibrary\Mailer;

class MailerException extends \RuntimeException
{
    /**
     * {@inheritdoc}
     */
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
