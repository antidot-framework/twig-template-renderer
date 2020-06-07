<?php

declare(strict_types=1);

namespace Antidot\Render\Twig\Container\Config;

class TwigConfig
{
    public const DEFAULT_TWIG_CONFIG = [
        'debug' => false,
        'file_extension' => 'twig',
        'charset' => 'utf-8',
        'template_path' => 'templates',
        'cache' => 'var/cache/twig',
        'auto_reload' => false,
        'autoescape' => 'html',
        'strict_variables' => true,
        'globals' => [
            // 'name' => 'value',
        ],
        'extensions' => [
            // EtensionClassName::class,
        ],
        'filters' => [
            // 'name' => PHPCallableClass::class,
            // 'some_function' => 'php_some_function,
        ],
    ];
}
