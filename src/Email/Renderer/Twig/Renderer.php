<?php

namespace Email\Render\Twig;

use Email\Render\RendererInterface;

/**
 * Class Renderer.
 */
class Renderer implements RendererInterface
{
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render($name, $context = array())
    {
        $template = $this->twig->loadTemplate($name);
        if (empty($template)) {
        }

        return $template->render($context);
    }
}
