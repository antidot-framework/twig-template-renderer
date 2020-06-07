<?php

declare(strict_types=1);

namespace AntidotTest\Render\Twig;

use Antidot\Render\Twig\TwigTemplateRenderer;
use PHPUnit\Framework\TestCase;
use Twig\Environment;

class TwigTemplateRendererTest extends TestCase
{
    /** @var \PHPUnit\Framework\MockObject\MockObject|Environment */
    private $twig;

    protected function setUp(): void
    {
        $this->twig = $this->createMock(Environment::class);
    }

    public function testItShouldRenderTemplate(): void
    {
        $renderer = new TwigTemplateRenderer(
            $this->twig
        );
        $this->twig->expects($this->once())
            ->method('render')
            ->with('app::index', ['name' => 'Koldo'])
            ->willReturn('');
        $renderer->render('app::index', ['name' => 'Koldo']);
    }
}
