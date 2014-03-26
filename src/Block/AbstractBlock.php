<?php

namespace Midnight\PageModule\Block;

abstract class AbstractBlock implements BlockInterface
{
    /**
     * @var string
     */
    private $id;
    /**
     * @var BlockContainerInterface
     */
    private $parent;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return BlockContainerInterface
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param BlockContainerInterface $parent
     *
     * @return void
     */
    public function setParent(BlockContainerInterface $parent = null)
    {
        $this->parent = $parent;
    }
}
