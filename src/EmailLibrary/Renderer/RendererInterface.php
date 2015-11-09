<?php

namespace Alexlbr\EmailLibrary\Render;

interface RendererInterface
{
    /**
     * @param string $name
     * @param array  $context
     *
     * @return mixed
     */
    public function render($name, $context = array());
}
