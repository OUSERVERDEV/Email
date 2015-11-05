<?php

namespace Email\Mailer\SendGrid;

use Email\EmailInterface;
use SendGrid;

class Mailer
{
    /**
     * @var SendGrid $sendGrid
     */
    protected $sendGrid;

    /**
     * @var SendGridEmailFactoryInterface $sendGridEmailFactory
     */
    protected $sendGridEmailFactory;

    /**
     * @param                               $apiUserOrKey
     * @param null                          $apiKeyOrOptions
     * @param array                         $options
     * @param SendGridEmailFactoryInterface $sendGridEmailFactory
     */
    public function __construct(
        $apiUserOrKey,
        $apiKeyOrOptions = null,
        $options = [],
        SendGridEmailFactoryInterface $sendGridEmailFactory
    ) {
        $this->sendGrid             = new SendGrid($apiUserOrKey, $apiKeyOrOptions, $options);
        $this->sendGridEmailFactory = $sendGridEmailFactory;
    }

    /**
     * @param EmailInterface $email
     * @param array          $options
     *
     * @throws SendGrid\Exception
     */
    public function send(EmailInterface $email, array $options)
    {
        $sendgridEmail = $this->sendGridEmailFactory->getSendGridEmail($email, $options);
        $this->sendGrid->send($sendgridEmail);
    }
}
