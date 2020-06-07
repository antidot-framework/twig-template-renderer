# Antidot Framework Twig Template Renderer

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Total Downloads][ico-downloads]][link-downloads]

Twig Template Renderer for Antidot Framework

## Install

Via Composer

``` bash
$ composer require antidot-fw/twig-template-renderer
```

### Antidot framework

It will work out of the box, the only thing you need is to inject the TemplateRenderer interface in your request handler constructor

### As standalone component

See factory classes at `src/Container`.

## Config

```php
<?php

declare(strict_types=1);

$config = [
    'template' => [
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
        'functions' => [
            // 'name' => PHPCallableClass::class,
            // 'some_function' => 'php_some_function,
        ],
    ],
];
```

## Usage

See full [Twig documentation](https://twig.symfony.com/doc/3.x/) for more detail.

### In a request handler

```php
<?php

declare(strict_types=1);

use Antidot\Render\TemplateRenderer;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class SomeHandler implements RequestHandlerInterface
{
    private TemplateRenderer $template;

    public function __construct(TemplateRenderer $template) 
    {
        $this->template = $template;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        return new HtmlResponse(
            $this->template->render('index.html', [
                'name' => 'Koldo ;-D',
            ])
        );
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email kpicaza@example.com instead of using the issue tracker.

## Credits

- [kpicaza][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/antidot-fw/twig-template-renderer.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://scrutinizer-ci.com/g/antidot-framework/twig-template-renderer/badges/coverage.png?b=master
[ico-scrutinizer]: https://scrutinizer-ci.com/g/antidot-framework/twig-template-renderer/badges/quality-score.png?b=master
[ico-code-quality]: https://img.shields.io/scrutinizer/g/antidot-fw/twig-template-renderer.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/antidot-fw/twig-template-renderer.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/antidot-fw/twig-template-renderer
[link-travis]: https://travis-ci.org/antidot-fw/twig-template-renderer
[link-scrutinizer]: https://scrutinizer-ci.com/g/antidot-fw/twig-template-renderer/code-structure
[link-downloads]: https://packagist.org/packages/antidot-fw/twig-template-renderer
[link-author]: https://github.com/kpicaza
[link-contributors]: ../../contributors
