<?php

namespace MidnightTest\PageModule\Page;

use Midnight\PageModule\Page\Page;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;

class PageTest extends PHPUnit_Framework_TestCase
{
    public function testNewPageHasNoBlocks()
    {
        $page = new Page();
        $this->assertEquals([], $page->getBlocks());
    }

    public function testNewPageHasNoId()
    {
        $page = new Page();
        $this->assertNull($page->getId());
    }

    public function testSetGetBlocks()
    {
        $block1 = $this->getMockBlock();
        $block2 = $this->getMockBlock();
        $blocks = [$block1, $block2];
        $page = new Page();
        $page->setBlocks($blocks);
        $this->assertEquals($blocks, $page->getBlocks());
    }

    public function testSetGetName()
    {
        $name = 'Foo';
        $page = new Page();
        $page->setName($name);
        $this->assertEquals($name, $page->getName());
    }

    public function testOldBlocksAreDetachedWhenReplaced()
    {
        $old = $this->getMockBlock();
        $page = new Page();
        $new = [$this->getMockBlock()];
        $page->addBlock($old);
        $old->expects($this->once())
            ->method('setParent')
            ->with(null);
        $page->setBlocks($new);
    }

    public function testParentIsSetOnBlockWhenAddedToPage()
    {
        $page = new Page();
        $block = $this->getMockBlock();
        $block->expects($this->once())->method('setParent')->with($this->equalTo($page));
        $page->addBlock($block);
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function getMockBlock()
    {
        return $this->getMock('Midnight\PageModule\Block\BlockInterface');
    }
}
