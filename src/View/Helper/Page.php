<?php

namespace Midnight\PageModule\View\Helper;

use Midnight\PageModule\Block\BlockInterface;
use Midnight\PageModule\Block\BlockRendererInterface;
use Midnight\PageModule\Block\Renderer\Exception\RendererNotFoundException;
use Midnight\PageModule\Page\PageInterface;
use Zend\View\Helper\AbstractHelper;

class Page extends AbstractHelper
{
    /**
     * @var BlockRendererInterface[]
     */
    private $blockRenderers = [];

    public function __invoke(PageInterface $page)
    {
        $rendered = [];
        foreach ($page->getBlocks() as $block) {
            $rendered[] = $this->getBlockRenderer($block)->render($block);
        }
        return join('', $rendered);
    }

    /**
     * @param string                 $class
     * @param BlockRendererInterface $renderer
     */
    public function setRenderer($class, BlockRendererInterface $renderer)
    {
        $this->blockRenderers[$class] = $renderer;
    }

    /**
     * @param BlockInterface $block
     *
     * @throws RendererNotFoundException
     * @return BlockRendererInterface
     */
    private function getBlockRenderer(BlockInterface $block)
    {
        $class = get_class($block);
        if (!isset($this->blockRenderers[$class])) {
            throw new RendererNotFoundException();
        }
        $renderer = $this->blockRenderers[$class];
        return $renderer;
    }
}
