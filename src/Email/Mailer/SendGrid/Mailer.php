<?php

namespace Email\Mailer\SendGrid;

use Email\EmailInterface;
use Email\Mailer\MailerInterface;
use SendGrid;

class Mailer implements MailerInterface
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
     * {@inheritDoc}
     */
    public function send(EmailInterface $email, array $options)
    {
        $sendgridEmail = $this->sendGridEmailFactory->createSendGridEmail($email, $options);
        $this->sendGrid->send($sendgridEmail);
    }
}
