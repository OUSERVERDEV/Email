<?php

namespace Alexlbr\EmailLibrary;

interface EmailInterface
{
    /**
     * @return string
     */
    public function getFrom();

    /**
     * @return array
     */
    public function getTo();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getBodyText();

    /**
     * @return string
     */
    public function getBodyHtml();

    /**
     * @param array|string $to
     */
    public function addTo($to);
}
