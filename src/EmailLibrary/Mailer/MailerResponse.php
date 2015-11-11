<?php

namespace Alexlbr\EmailLibrary\Mailer;

class MailerResponse implements MailerResponseInterface
{
    /**
     * @var integer
     */
    protected $code;

    /**
     * @var array
     */
    protected $headers;

    /**
     * @var string
     */
    protected $body;

    /**
     * @param integer $code
     * @param array $headers
     * @param string $body
     */
    public function __construct($code, array $headers, $body)
    {
        $this->code = $code;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * {@inheritDoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * {@inheritDoc}
     */
    public function getBody()
    {
        return $this->body;
    }
}
