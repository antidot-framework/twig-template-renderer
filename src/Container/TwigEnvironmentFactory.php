<?php

declare(strict_types=1);

namespace Antidot\Render\Twig\Container;

use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

class TwigEnvironmentFactory
{
    public function __invoke(ContainerInterface $container): Environment
    {
        $config = $container->get('config')['template'];
        $loader = new FilesystemLoader($config['template']);

        $environment = new Environment($loader, $config);
        foreach ($config['filters'] ?? [] as $filterName => $filter) {
            $environment->addFilter(new TwigFilter($filterName, $filter));
        }
        foreach ($config['extensions'] ?? [] as $extension) {
            $environment->addExtension($container->get($extension));
        }
        foreach ($config['globals'] ?? [] as $globalName => $global) {
            $environment->addGlobal($globalName, $global);
        }

        return $environment;
    }
}