<?php

namespace Email\Render;

/**
 * Interface RendererInterface.
 */
interface RendererInterface
{
    public function render($name, $context = array());
}
