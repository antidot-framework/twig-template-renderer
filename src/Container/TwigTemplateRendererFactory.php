<?php

declare(strict_types=1);

namespace Antidot\Render\Twig\Container;

use Antidot\Render\Twig\TwigTemplateRenderer;
use Psr\Container\ContainerInterface;
use Twig\Environment;

class TwigTemplateRendererFactory
{
    public function __invoke(ContainerInterface $container): TwigTemplateRenderer
    {
        return new TwigTemplateRenderer(
            $container->get(Environment::class),
            $container->get('config')['template']['file_extension']
        );
    }
}
