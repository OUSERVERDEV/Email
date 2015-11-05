<?php

namespace Email\Mailer\SendGrid;

use SendGrid\Email;

class Mailer
{
    /**
     * @var SendGrid $sendGrid
     */
    protected $sendGrid;
    /**
     * @var Email $mail
     */
    protected $mail;
    /**
     * @var string $subject
     */
    protected $subject;
    /**
     * @var string $body
     */
    protected $body;
    /**
     * @var array $attachments
     */
    protected $attachments;
    /**
     * @param SendGrid $sendGrid
     * @param Email    $mail
     */
    public function __construct(SendGrid $sendGrid, Email $mail)
    {
        $this->sendGrid = $sendGrid;
        $this->mail     = $mail;
    }

    /**
     * Set Subject
     *
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param string $attachment
     */
    public function addAttachment($attachment)
    {
        $this->attachments[] = $attachment;
    }

    /**
     *
     * @throws \SendGrid\Exception
     */
    public function send()
    {
        $this->mail
            ->setSubject($this->subject)
            ->setHtml($this->body)
            ->setText(htmlspecialchars($this->body));
        if (!empty($this->attachments)) {
            $this->mail->setAttachments($this->attachments);
        }
        $this->sendGrid->send($this->mail);
    }
}
