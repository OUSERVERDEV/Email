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
    private $html;

    /**
     * @var string
     */
    private $text;

    public function __construct(
        $from,
        $to,
        $subject = null,
        $html = null,
        $text = null
    ) {
        $this->from    = $from;
        $this->to      = $to;
        $this->subject = $subject;
        $this->html    = $html;
        $this->text    = $text;
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
     * Set from
     *
     * @param string $from
     *
     * @return $this
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
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
     * Set to
     *
     * @param array $to
     *
     * @return $this
     */
    public function setTo(array $to)
    {
        $this->to = $to;

        return $this;
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
     * Set subject
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
     * Get html
     *
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Set html
     *
     * @param string $html
     *
     * @return $this
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
