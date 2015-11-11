<?php

namespace Alexlbr\EmailLibrary\Mailer\SendGrid;

use Alexlbr\EmailLibrary\EmailInterface;

class EmailDecorator implements EmailInterface
{
    /**
     * @var array
     */
    protected $categories = array();

    /**
     * Constructor.
     *
     * @param EmailInterface $email
     */
    public function __construct(EmailInterface $email)
    {
        $this->email = $email;
    }

    /**
     * Get categories
     *
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set categories
     *
     * @param array $categories
     *
     * @return $this
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @param string $category
     *
     * @return $this
     */
    public function addCategory($category)
    {
        if (!is_array($this->categories)) {
            $this->categories = array();
        }
        $this->categories[] = $category;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFrom()
    {
        return $this->email->getFrom();
    }

    /**
     * {@inheritDoc}
     */
    public function getFromName()
    {
        return $this->email->getFromName();
    }

    /**
     * {@inheritDoc}
     */
    public function getTo()
    {
        return $this->email->getTo();
    }

    /**
     * {@inheritDoc}
     */
    public function addTo($to)
    {
        $this->email->addTo($to);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubject()
    {
        return $this->email->getSubject();
    }

    /**
     * {@inheritDoc}
     */
    public function getBodyHtml()
    {
        return $this->email->getBodyHtml();
    }

    /**
     * {@inheritDoc}
     */
    public function getBodyText()
    {
        return $this->email->getBodyText();
    }

    /**
     * {@inheritDoc}
     */
    public function getAttachments()
    {
        return $this->email->getAttachments();
    }

    /**
     * {@inheritDoc}
     */
    public function addAttachment($attachment)
    {
        $this->email->addAttachment($attachment);

        return $this;
    }
}
