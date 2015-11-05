<?php

namespace Email;

class Email implements EmailInterface
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var array
     */
    private $to;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $bodyHtml;

    /**
     * @var string
     */
    private $bodyText;

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
     * Get from
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Get to
     *
     * @return array
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Add to
     *
     * @param array|string $to
     *
     * @return $this
     */
    public function addTo($to)
    {
        if (null === $this->to) {
            $this->to = [];
        }

        if (is_array($to)) {
            foreach ($to as $email) {
                $this->to[] = $email;
            }
        } else {
            $this->to[] = $to;
        }

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Get bodyHtml
     *
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->bodyHtml;
    }

    /**
     * Get bodyText
     *
     * @return string
     */
    public function getBodyText()
    {
        return $this->bodyText;
    }
}
