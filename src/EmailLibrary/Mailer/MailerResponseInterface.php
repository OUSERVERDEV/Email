<?php

namespace Alexlbr\EmailLibrary\Mailer;

interface MailerResponseInterface
{
    /**
     * @return int
     */
    public function getCode();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getBody();
}
