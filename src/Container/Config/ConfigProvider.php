<?php

declare(strict_types=1);

namespace Antidot\Render\Twig\Container\Config;

use Antidot\Render\TemplateRenderer;
use Antidot\Render\Twig\Container\TwigEnvironmentFactory;
use Antidot\Render\Twig\TwigTemplateRenderer;
use Twig\Environment;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'template' => TwigConfig::DEFAULT_TWIG_CONFIG,
            'dependencies' => $this->getDependencies(),
        ];
    }

    private function getDependencies(): array
    {
        return [
            'factories' => [
                Environment::class => TwigEnvironmentFactory::class,
            ],
            'services' => [
                TemplateRenderer::class => TwigTemplateRenderer::class,
            ],
        ];
    }
}
