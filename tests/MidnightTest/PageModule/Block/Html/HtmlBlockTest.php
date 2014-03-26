<?php

namespace MidnightTest\PageModule\Block\Html;

use Midnight\PageModule\Block\Html\HtmlBlock;
use PHPUnit_Framework_TestCase;

class HtmlBlockTest extends PHPUnit_Framework_TestCase
{
    public function testSetGetHtml()
    {
        $html = 'Foo';
        $block = new HtmlBlock();
        $block->setHtml($html);
        $this->assertEquals($html, $block->getHtml());
    }

    public function testSetGetParent()
    {
        $block = new HtmlBlock();
        $page = $this->getMock('Midnight\PageModule\Block\BlockContainerInterface');
        $block->setParent($page);
        $this->assertEquals($page, $block->getParent());
    }

    public function testNewBlockHasNoId()
    {
        $block = new HtmlBlock();
        $this->assertNull($block->getId());
    }
}
