<?php

namespace Midnight\PageModule\Storage\Adapter;

use Doctrine\ODM\MongoDB\DocumentManager;
use Midnight\PageModule\Page\PageInterface;

class DoctrineMongoDb implements StorageAdapterInterface
{
    /**
     * @var DocumentManager
     */
    private $dm;

    /**
     * @param DocumentManager $dm
     */
    public function setDocumentManager($dm)
    {
        $this->dm = $dm;
    }

    /**
     * @param mixed $pageId
     *
     * @return PageInterface
     */
    public function get($pageId)
    {
        return $this->getDocumentManager()->find('Midnight\PageModule\Page', $pageId);
    }

    /**
     * @return DocumentManager
     */
    private function getDocumentManager()
    {
        return $this->dm;
    }
}
