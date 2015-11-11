<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid\Factory;

use SendGrid\Email as SendGridEmail;
use Alexlbr\EmailLibrary\EmailInterface;

class SendGridEmailFactory implements SendGridEmailFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createSendGridEmail(EmailInterface $email)
    {
        $sendGridEmail = new SendGridEmail();

        $sendGridEmail->addTo($email->getTo());
        $sendGridEmail->setFrom($email->getFrom());
        $sendGridEmail->setFromName($email->getFromName());
        $sendGridEmail->setSubject($email->getSubject());
        $sendGridEmail->setText($email->getBodyText());
        $sendGridEmail->setHtml($email->getBodyHtml());

        if (is_array($email->getAttachments())) {
            $sendGridEmail->setAttachments($email->getAttachments());
        }

        if ($email instanceof EmailDecorator) {
            $sendGridEmail->setCategories($email->getCategories());
        }

        return $sendGridEmail;
    }
}
