<?php

namespace Email;

interface EmailInterface
{
    /**
     * @return string
     */
    public function getFrom();

    /**
     * @return string
     */
    public function getHtml();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getText();

    /**
     * @return array
     */
    public function getTo();

    /**
     * @param string $subject
     */
    public function setSubject($subject);

    /**
     * @param string $text
     */
    public function setText($text);

    /**
     * @param string $html
     */
    public function setHtml($html);

    /**
     * @param string $from
     */
    public function setFrom($from);

    /**
     * @param array $to
     */
    public function setTo(array $to);

    /**
     * @param array|string $to
     */
    public function addTo($to);
}
