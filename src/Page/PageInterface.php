<?php

namespace Midnight\PageModule\Page;

use Midnight\PageModule\Block\BlockInterface;

interface PageInterface
{
    /**
     * @return BlockInterface[]
     */
    public function getBlocks();
}
