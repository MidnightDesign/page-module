<?php

namespace Midnight\PageModule\Page;

use Midnight\PageModule\Block\BlockContainerInterface;
use Midnight\PageModule\Block\BlockInterface;

class Page implements PageInterface, BlockContainerInterface
{
    /**
     * @var mixed
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var BlockInterface[]
     */
    private $blocks = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return BlockInterface[]
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @param BlockInterface[] $blocks
     */
    public function setBlocks($blocks)
    {
        $this->clearBlocks();
        foreach ($blocks as $block) {
            $this->addBlock($block);
        }
    }

    /**
     * @param BlockInterface $block
     */
    public function addBlock(BlockInterface $block)
    {
        $this->blocks[] = $block;
        $block->setParent($this);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Removes all blocks from the page
     *
     * Sets the removed block's parents to null.
     */
    private function clearBlocks()
    {
        foreach ($this->blocks as $block) {
            $block->setParent(null);
        }
        $this->blocks = [];
    }
} 
