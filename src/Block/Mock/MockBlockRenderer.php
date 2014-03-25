<?php

namespace Midnight\PageModule\Block\Mock;

use Midnight\PageModule\Block\BlockInterface;
use Midnight\PageModule\Block\BlockRendererInterface;

class MockBlockRenderer implements BlockRendererInterface
{
    const RETURN_VALUE = 'Foo';
    /**
     * Always returns "Foo"
     *
     * @param BlockInterface $block
     *
     * @return string
     */
    public function render(BlockInterface $block)
    {
        return self::RETURN_VALUE;
    }
}
