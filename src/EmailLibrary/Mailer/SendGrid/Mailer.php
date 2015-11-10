<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid;

use Alexlbr\EmailLibrary\EmailInterface;
use Alexlbr\EmailLibrary\Mailer\MailerException;
use Alexlbr\EmailLibrary\Mailer\MailerInterface;
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
     * Constructor.
     *
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
    public function send(EmailInterface $email)
    {
        $sendgridEmail = $this->sendGridEmailFactory->createSendGridEmail($email);

        try {
            $this->sendGrid->send($sendgridEmail);
        } catch (\SendGrid\Exception $exception) {
            throw new MailerException($exception->getMessage(), 0, array($exception));
        }
    }
}
