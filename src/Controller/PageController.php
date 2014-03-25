<?php

namespace Midnight\PageModule\Controller;

use Midnight\PageModule\Page\PageInterface;
use Midnight\PageModule\Storage\Adapter\StorageAdapterInterface;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\ServiceManager;

/**
 * Class PageController
 *
 * @package Midnight\PageModule\Block\Controller
 *
 * @method Response getResponse
 * @method ServiceManager getServiceLocator
 */
class PageController extends AbstractActionController
{
    public function pageAction()
    {
        $pageId = $this->params()->fromRoute('page_id');
        if (!$pageId) {
            return $this->fail(400, 'No page ID given');
        }
        $page = $this->getPage($pageId);
        if (!$page) {
            return $this->fail(404, 'Page not found');
        }
        return array(
            'page' => $page,
        );
    }

    /**
     * @param mixed $pageId
     *
     * @return PageInterface
     */
    private function getPage($pageId)
    {
        return $this->getStorageAdapter()->get($pageId);
    }

    /**
     * @return StorageAdapterInterface
     */
    private function getStorageAdapter()
    {
        return $this->getServiceLocator()->get('Midnight\PageModule\Storage\Adapter');
    }

    /**
     * @param integer $statusCode
     * @param string  $reasonPhrase
     *
     * @return \Zend\Http\Response
     */
    private function fail($statusCode, $reasonPhrase)
    {
        return $this->getResponse()->setStatusCode($statusCode)->setReasonPhrase($reasonPhrase);
    }
} 
