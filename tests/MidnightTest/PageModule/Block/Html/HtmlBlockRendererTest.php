<?php

namespace MidnightTest\PageModule\Block\Html;

use Midnight\PageModule\Block\Html\HtmlBlockRenderer;
use PHPUnit_Framework_TestCase;

class HtmlBlockRendererTest extends PHPUnit_Framework_TestCase
{
    public function testRenderSimple()
    {
        $block = $this->getMock('Midnight\PageModule\Block\Html\HtmlBlock');
        $renderer = $this->getRenderer();
        $block->expects($this->once())->method('getHtml')->will($this->returnValue('Foo'));
        $rendered = $renderer->render($block);
        $this->assertEquals('Foo', $rendered);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRenderThrowsExceptionOnWrongType()
    {
        $block = $this->getMock('Midnight\PageModule\Block\BlockInterface');
        $this->getRenderer()->render($block);
    }

    private function getRenderer()
    {
        return new HtmlBlockRenderer();
    }
}
