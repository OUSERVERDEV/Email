<?php
/**
 * Created by PhpStorm.
 * User: ironweb
 * Date: 06/11/15
 * Time: 13:55
 */

namespace Alexlbr\EmailLibrary\Mailer\SendGrid;


use Alexlbr\EmailLibrary\EmailInterface;

class EmailDecorator implements EmailInterface
{
    protected $categories = array();

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
}
