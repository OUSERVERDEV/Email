<?php

namespace Alexlbr\EmailLibrary\Render;

interface RendererInterface
{
    /**
     * @param       $name
     * @param array $context
     *
     * @return mixed
     */
    public function render($name, $context = array());
}
