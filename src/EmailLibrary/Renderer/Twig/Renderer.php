<?php

namespace Alexlbr\EmailLibrary\Render\Twig;

use Alexlbr\EmailLibrary\Render\RendererInterface;

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
