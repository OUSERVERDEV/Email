<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid\Factory;

use Alexlbr\EmailLibrary\Mailer\SendGrid\EmailDecorator;
use SendGrid\Attachment;
use SendGrid\Content;
use SendGrid\Email as SendGridEmail;
use Alexlbr\EmailLibrary\EmailInterface;
use SendGrid\Mail;
use SendGrid\Personalization;

class SendGridEmailFactory implements SendGridEmailFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createSendGridEmail(EmailInterface $emailObj)
    {
        $mail  = new Mail();
        $email = new SendGridEmail($emailObj->getFromName(), $emailObj->getFrom());
        $mail->setFrom($email);
        $mail->setSubject($emailObj->getSubject());
        $personalization = new Personalization();
        foreach ($emailObj->getTo() as $emailAddress) {
            $emailTo = new SendGridEmail(null, $emailAddress);
            $personalization->addTo($emailTo);
        }
        $mail->addPersonalization($personalization);

        $content = new Content("text/plain", $emailObj->getBodyText());
        $mail->addContent($content);
        $content = new Content("text/html", $emailObj->getBodyHtml());
        $mail->addContent($content);

        foreach ($emailObj->getAttachments() as $attachmentUrl) {
            $attachment = new Attachment();
            $attachment->setContent(file_get_contents($attachmentUrl));
            $attachment->setType('application/pdf');
            $mail->addAttachment($attachment);
        }

        if ($emailObj instanceof EmailDecorator) {
            $mail->addCategory($emailObj->getCategories());

            if (!is_null($emailObj->getSendAt())) {
                $mail->setSendAt($emailObj->getSendAt());
            }
        }

        return $mail;
    }
}
