<?php

declare(strict_types=1);

namespace Antidot\Render\Twig\Container;

use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;
use Twig\TwigFunction;
use function getcwd;

class TwigEnvironmentFactory
{
    public function __invoke(ContainerInterface $container): Environment
    {
        $config = $container->get('config')['template'];
        $loader = new FilesystemLoader(getcwd() . '/' . $config['template_path'], '__main__');
        $environment = new Environment($loader, $config);

        foreach ($config['filters'] ?? [] as $filterName => $filter) {
            $environment->addFilter(new TwigFilter($filterName, $filter));
        }
        foreach ($config['functions'] ?? [] as $functionName => $function) {
            $environment->addFunction(new TwigFunction($functionName, $function));
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
