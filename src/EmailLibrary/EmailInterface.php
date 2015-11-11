<?php

namespace Alexlbr\EmailLibrary;

interface EmailInterface
{
    /**
     * @return string
     */
    public function getFrom();

    /**
     * @return string
     */
    public function getFromName();

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
     * @return array
     */
    public function getAttachments();

    /**
     * @param array|string $to
     */
    public function addTo($to);

    /**
     * @param string $pathToAttachment
     */
    public function addAttachment($pathToAttachment);
}
