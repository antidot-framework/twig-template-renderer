<?php

declare(strict_types=1);

namespace Antidot\Render\Twig;

use Antidot\Render\TemplateRenderer;
use Twig\Environment;

class TwigTemplateRenderer implements TemplateRenderer
{
    private Environment $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render(string $template, array $data = []): string
    {
        return $this->twig->render($template, $data);
    }
}
