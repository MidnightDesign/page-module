<?php

namespace MidnightTest\PageModule\Storage\Adapter;

use Midnight\PageModule\Page\Page;
use Midnight\PageModule\Storage\Adapter\DoctrineMongoDb;

class DoctrineMongoDbTest extends \PHPUnit_Framework_TestCase
{
    public function testGetPage()
    {
        $adapter = new DoctrineMongoDb();
        $dm = $this->getMock('Doctrine\ODM\MongoDB\DocumentManager', array(), array(), '', false);
        $page = new Page();
        $dm->expects($this->any())->method('find')->will($this->returnValue($page));
        $adapter->setDocumentManager($dm);
        $this->assertEquals($page, $adapter->get(1));
    }
}
