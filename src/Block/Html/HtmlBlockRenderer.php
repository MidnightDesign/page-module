<?php

namespace Midnight\PageModule\Block\Html;

use Midnight\PageModule\Block\BlockInterface;
use Midnight\PageModule\Block\BlockRendererInterface;

class HtmlBlockRenderer implements BlockRendererInterface
{
    /**
     * @param BlockInterface $block
     *
     * @throws \InvalidArgumentException
     * @return string
     */
    public function render(BlockInterface $block)
    {
        if (!$block instanceof HtmlBlock) {
            throw new \InvalidArgumentException();
        }
        return $block->getHtml();
    }
}
