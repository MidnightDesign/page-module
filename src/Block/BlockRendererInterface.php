<?php

namespace Midnight\PageModule\Block;

interface BlockRendererInterface
{
    /**
     * @param BlockInterface $block
     *
     * @return string
     */
    public function render(BlockInterface $block);
}
