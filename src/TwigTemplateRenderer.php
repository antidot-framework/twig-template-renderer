<?php

declare(strict_types=1);

namespace Antidot\Render\Twig;

use Antidot\Render\TemplateRenderer;
use Twig\Environment;

class TwigTemplateRenderer implements TemplateRenderer
{
    private Environment $twig;
    private string $extension;

    public function __construct(Environment $twig, string $extension = 'twig')
    {
        $this->twig = $twig;
        $this->extension = $extension;
    }

    public function render(string $template, array $data = []): string
    {
        return $this->twig->render(sprintf(
            '%s.%s',
            str_replace('::', '/', $template),
            $this->extension
        ), $data);
    }
}
