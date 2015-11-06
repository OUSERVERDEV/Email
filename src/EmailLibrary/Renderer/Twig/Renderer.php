<?php

namespace Alexlbr\EmailLibrary\Render\Twig;

use Alexlbr\EmailLibrary\Render\RendererInterface;

class Renderer implements RendererInterface
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * Constructor.
     *
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param string $name
     * @param array  $context
     *
     * @return mixed
     */
    public function render($name, $context = array())
    {
        $template = $this->twig->loadTemplate($name);

        return $template->render($context);
    }
}
