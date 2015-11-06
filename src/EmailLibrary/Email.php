<?php

namespace Alexlbr\EmailLibrary;

class Email implements EmailInterface
{
    /**
     * @var string
     */
    protected $from;

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
     * @param string $from
     * @param array  $to
     * @param string $subject
     * @param string $bodyHtml
     * @param string $bodyText
     */
    public function __construct(
        $from,
        array $to,
        $subject = null,
        $bodyHtml = null,
        $bodyText = null
    ) {
        $this->from     = $from;
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
}
