<?php

namespace Midnight\PageModule\Storage\Adapter;

use Midnight\PageModule\Page\PageInterface;

interface StorageAdapterInterface
{
    /**
     * @param mixed $pageId
     *
     * @return PageInterface
     */
    public function get($pageId);
}
