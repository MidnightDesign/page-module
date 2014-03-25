<?php

namespace Midnight\PageModule\Block;

interface BlockInterface
{
    /**
     * @param BlockContainerInterface $parent
     *
     * @return void
     */
    public function setParent(BlockContainerInterface $parent = null);
}
