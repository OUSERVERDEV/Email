<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid;

use Alexlbr\EmailLibrary\EmailInterface;
use Alexlbr\EmailLibrary\Mailer\MailerException;
use Alexlbr\EmailLibrary\Mailer\MailerInterface;
use Alexlbr\EmailLibrary\Mailer\SendGrid\Factory\SendGridEmailFactoryInterface;
use Alexlbr\EmailLibrary\Mailer\SendGrid\Factory\SendGridResponseFactoryInterface;
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
     * @param SendGridEmailFactoryInterface    $sendGridEmailFactory
     * @param SendGrid                         $sendGrid
     * @param SendGridResponseFactoryInterface $sendGridResponseFactory
     */
    public function __construct(
        SendGridEmailFactoryInterface $sendGridEmailFactory,
        SendGrid $sendGrid,
        SendGridResponseFactoryInterface $sendGridResponseFactory
    ) {
        $this->sendGrid                = $sendGrid;
        $this->sendGridEmailFactory    = $sendGridEmailFactory;
        $this->sendGridResponseFactory = $sendGridResponseFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function send(EmailInterface $email)
    {
        $sendgridEmail = $this->sendGridEmailFactory->createSendGridEmail($email);

        try {
            $sendGridReponse = $this->sendGrid->send($sendgridEmail);
            $mailerResponse  = $this->sendGridResponseFactory->createMailerResponse($sendGridReponse);

            return $mailerResponse;
            
        } catch (\SendGrid\Exception $exception) {
            throw new MailerException($exception->getMessage(), 0, $exception);
        }
    }
}
