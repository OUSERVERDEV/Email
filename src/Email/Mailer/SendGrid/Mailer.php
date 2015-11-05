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
     * @param SendGridEmailFactoryInterface $sendGridEmailFactory
     * @param SendGrid                      $sendGrid
     */
    public function __construct(
        SendGridEmailFactoryInterface $sendGridEmailFactory,
        SendGrid $sendGrid
    ) {
        $this->sendGrid             = $sendGrid;
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
        $sendgridEmail = $this->sendGridEmailFactory->createSendGridEmail($email, $options);
        $this->sendGrid->send($sendgridEmail);
    }
}
