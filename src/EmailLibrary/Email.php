<?php

namespace Alexlbr\EmailLibrary;

class Email implements EmailInterface
{
    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $fromName;

    /**
     * @var array
     */
    protected $to;

    /**
     * @var string
     */
    protected $subject;

    /**
     * @var string
     */
    protected $bodyHtml;

    /**
     * @var string
     */
    protected $bodyText;

    /**
     * @var array
     */
    protected $attachments = [];

    /**
     * @param       $from
     * @param       $fromName
     * @param array $to
     * @param null  $subject
     * @param null  $bodyHtml
     * @param null  $bodyText
     */
    public function __construct(
        $from,
        $fromName,
        array $to,
        $subject = null,
        $bodyHtml = null,
        $bodyText = null
    ) {
        $this->from     = $from;
        $this->fromName = $fromName;
        $this->to       = $to;
        $this->subject  = $subject;
        $this->bodyHtml = $bodyHtml;
        $this->bodyText = $bodyText;
    }

    /**
     * {@inheritDoc}
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * {@inheritDoc}
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * {@inheritDoc}
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * {@inheritDoc}
     */
    public function addTo($to)
    {
        if (false === is_array($this->to)) {
            $this->to = [];
        }

        if (is_array($to)) {
            $this->to = array_merge($this->to, $to);
        } else {
            $this->to[] = $to;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * {@inheritDoc}
     */
    public function getBodyHtml()
    {
        return $this->bodyHtml;
    }

    /**
     * {@inheritDoc}
     */
    public function getBodyText()
    {
        return $this->bodyText;
    }

    /**
     * {@inheritDoc}
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * {@inheritDoc}
     */
    public function addAttachment($pathToAttachment)
    {
        if (false === is_array($this->attachments)) {
            $this->attachments = [];
        }

        if (is_array($pathToAttachment)) {
            $this->attachments = array_merge($this->attachments, $pathToAttachment);
        } else {
            $this->attachments[] = $pathToAttachment;
        }

        return $this;
    }
}
