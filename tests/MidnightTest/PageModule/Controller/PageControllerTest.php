<?php

namespace MidnightTest\PageModule\Controller;

use Midnight\PageModule\Controller\PageController;
use Midnight\PageModule\Page\Page;
use PHPUnit_Framework_TestCase;
use Zend\Http\Response;
use Zend\ServiceManager\ServiceManager;

class PageControllerTest extends PHPUnit_Framework_TestCase
{
    public function testStatusCode400IsReturnedWhenNoIdIsGiven()
    {
        $controller = new PageController();
        $controller->getPluginManager()->setService('params', $this->params(['page_id' => null]));
        $response = $controller->pageAction();
        $this->assertInstanceOf('Zend\Http\Response', $response);
        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testStatusCode404IsReturnedIfPageIsNotFound()
    {
        $controller = new PageController();
        $controller->getPluginManager()->setService('params', $this->params(['page_id' => 1]));
        $serviceManager = new ServiceManager();
        $storageAdapter = $this->storageAdapter();
        $storageAdapter->expects($this->any())->method('get')->will($this->returnValue(null));
        $serviceManager->setService('Midnight\PageModule\Storage\Adapter', $storageAdapter);
        $controller->setServiceLocator($serviceManager);
        $response = $controller->pageAction();
        $this->assertInstanceOf('Zend\Http\Response', $response);
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testFoundPageIsReturned()
    {
        $controller = new PageController();
        $controller->getPluginManager()->setService('params', $this->params(['page_id' => 1]));
        $storageAdapter = $this->storageAdapter();
        $page = new Page();
        $storageAdapter->expects($this->any())->method('get')->will($this->returnValue($page));
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Midnight\PageModule\Storage\Adapter', $storageAdapter);
        $controller->setServiceLocator($serviceManager);
        $r = $controller->pageAction();
        $this->assertEquals($r['page'], $page);
    }

    private function params($routeValues)
    {
        $params = $this->getMock('Zend\Mvc\Controller\Plugin\Params');
        foreach ($routeValues as $key => $val) {
            $params->expects($this->any())->method('fromRoute')->with($this->equalTo($key))->will($this->returnValue($val));
        }
        $params->expects($this->any())->method('__invoke')->will($this->returnValue($params));
        return $params;
    }

    private function storageAdapter()
    {
        $adapter = $this->getMock('Midnight\PageModule\Storage\Adapter\StorageAdapterInterface');
        return $adapter;
    }
}
