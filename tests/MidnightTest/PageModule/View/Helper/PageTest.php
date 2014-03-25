<?php

namespace MidnightTest\PageModule\View\Helper;

use Midnight\PageModule\Block\Html\HtmlBlockRenderer;
use Midnight\PageModule\Block\Mock\MockBlock;
use Midnight\PageModule\Block\Mock\MockBlockRenderer;
use Midnight\PageModule\View\Helper\Page;
use PHPUnit_Framework_TestCase;

class PageTest extends PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Midnight\PageModule\Block\Renderer\Exception\RendererNotFoundException
     */
    public function testExceptionIsThrownIfNoRendererIsFound()
    {
        $helper = new Page();
        $page = $this->getMock('Midnight\PageModule\Page\PageInterface');
        $block = $this->getMock('Midnight\PageModule\Block\BlockInterface');
        $page->expects($this->any())->method('getBlocks')->will($this->returnValue([$block]));
        $helper($page);
    }

    public function testEmptyPageReturnsEmptyString()
    {
        $helper = new Page();
        $page = $this->getMock('Midnight\PageModule\Page\PageInterface');
        $page->expects($this->any())->method('getBlocks')->will($this->returnValue([]));
        $this->assertEquals('', $helper($page));
    }

    public function testCorrectRendererIsUsed()
    {
        $helper = new Page();
        $page = $this->getMock('Midnight\PageModule\Page\PageInterface');
        $block = new MockBlock();
        $renderer = new MockBlockRenderer();
        $helper->setRenderer('Midnight\PageModule\Block\Mock\MockBlock', $renderer);
        $page->expects($this->any())->method('getBlocks')->will($this->returnValue([$block]));
        $this->assertEquals(MockBlockRenderer::RETURN_VALUE, $helper($page));
    }
}
