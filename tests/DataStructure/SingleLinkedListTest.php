<?php

namespace Tests\DataStrcture;

use DataStructure\LinkedList\SingleLinkedList;

use \PHPUnit\Framework\TestCase;


/**
 * 单链表测试用例
 */
class SingleLinkedListTest extends TestCase
{

    public $linkedlist;

    public function setUp()
    {
        $this->linkedlist = new SingleLinkedList();
        parent::setUp();
    }

    /**
     * 空链表测试
     */
    public function testEmpty()
    {
        $this->assertEmpty($this->linkedlist->getLen());
        return $this->linkedlist;
    }

    /**
     * @depends testEmpty
     */
    public function testInsert($linkedlist)
    {
        $linkedlist->insert('world');
        $this->assertEquals(1, $linkedlist->getLen());
        $this->assertEquals('world', $linkedlist->get(0));

        $linkedlist->insert('Hello');
        $this->assertEquals(2, $linkedlist->getLen());
        $this->assertEquals('Hello', $linkedlist->get(0));
        $this->assertEquals('world', $linkedlist->get(1));

        $linkedlist->insert('!', 2);
        $this->assertEquals(3, $linkedlist->getLen());
        $this->assertEquals('!', $linkedlist->get(2));

        return $linkedlist;
    }

    /**
     * @depends testInsert
     * @expectedException Exception
     */
    public function testInsertException($linkedlist)
    {
        $linkedlist->insert('negative number', -2);
        $linkedlist->insert('exceed limit', 10);
    }

    /**
     * @depends testInsert
     */
    public function testGetNode($linkedlist)
    {
        $node = $linkedlist->getNode(1);
        $this->assertEquals('world', $node->Data);

        $node = $linkedlist->getNode(2);
        $this->assertEquals('!', $node->Data);
    }

    /**
     * @expectedException Exception
     */
    public function testGetInvalidNode()
    {
        $this->getExpectedException($this->linkedlist->getNode(-1));
        $this->getExpectedException($this->linkedlist->getNode(11));
    }

    /**
     * 单链表反转
     */
    public function testReverse()
    {
        $this->linkedlist->insert('A');
        $this->assertEquals(true, $this->linkedlist->reverse());
        $this->assertEquals(1, $this->linkedlist->getLen());
        $this->assertEquals('A', $this->linkedlist->get(0));

        $this->linkedlist->insert('B');
        $this->assertEquals(true, $this->linkedlist->reverse());
        $this->assertEquals('A', $this->linkedlist->get(0));
        $this->assertEquals('B', $this->linkedlist->get(1));

        $this->linkedlist->insert('C');
        $this->assertEquals(true, $this->linkedlist->reverse());
        $this->assertEquals('B', $this->linkedlist->get(0));
        $this->assertEquals('A', $this->linkedlist->get(1));
        $this->assertEquals('C', $this->linkedlist->get(2));
    }

    /**
     * 
     */
    public function testSet()
    {
        $this->linkedlist->insert('A');

        // first node
        $this->assertEquals(true, $this->linkedlist->set(0, 'Hello'));
        $this->assertEquals('Hello', $this->linkedlist->get(0));

        $this->assertEquals(1, $this->linkedlist->getLen());

        $this->linkedlist->insert('B');
        // last node
        $this->assertEquals(true, $this->linkedlist->set(1, 'PHP'));
        $this->assertEquals('PHP', $this->linkedlist->get(1));
    }

    /**
     * @expectedException Exception
     * @expectExceptionCode -1
     */
    public function testSetNagativeError()
    {
        $this->linkedlist->set(-9, 'disable');
    }

    /**
     * @expectedException Exception
     * @expectExceptionCode 2
     */
    public function testSetExceedError()
    {
        $this->linkedlist->set(9, 'disable');
    }

    /**
     * 
     */
    public function testGet()
    {
        $this->linkedlist->insert('A');

        $this->assertEquals('A', $this->linkedlist->get(0));

        $this->linkedlist->insert('B');

        $this->assertEquals('B', $this->linkedlist->get(0));
        $this->assertEquals('A', $this->linkedlist->get(1));
    }

    /**
     * @expectedException Exception
     * @expectExceptionCode -1
     */
    public function testGetNagativeError()
    {
        $this->linkedlist->get(-9);
    }

    /**
     * @expectedException Exception
     * @expectExceptionCode -1
     */
    public function testGetExceedError()
    {
        $this->linkedlist->get(99);
    }


    /**
     *
     */
    public function testDelete()
    {
        $this->linkedlist->insert('CC');
        $this->linkedlist->insert('DD');
        $this->linkedlist->insert('EE');
        $this->linkedlist->insert('FF');
        $this->linkedlist->insert('GG');
        //middle node
        $this->assertEquals(true, $this->linkedlist->delete(2));
        $this->assertEquals(4, $this->linkedlist->getLen());
        $this->assertEquals('GG', $this->linkedlist->get(0));
        $this->assertEquals('FF', $this->linkedlist->get(1));
        $this->assertEquals('DD', $this->linkedlist->get(2));
    }


    public function testDeleteOneNode()
    {
        // one node
        $this->linkedlist->insert('A');
        $this->assertEquals(true, $this->linkedlist->delete(0));
        $this->assertEquals(0, $this->linkedlist->getLen());
    }

    public function testDeleteFirst()
    {
        //three node
        $this->linkedlist->insert('A');
        $this->linkedlist->insert('B');
        $this->linkedlist->insert('C');

        //first node
        $this->assertEquals(true, $this->linkedlist->delete(0));
        $this->assertEquals(2, $this->linkedlist->getLen());
        $this->assertEquals('B', $this->linkedlist->get(0));
    }

    public function testDeleteLast()
    {
        //last node
        $this->linkedlist->insert('LL');
        $this->linkedlist->insert('MM');
        $this->linkedlist->insert('NN');
        $this->linkedlist->insert('HH');
        $this->linkedlist->insert('II');
        $this->assertEquals(true, $this->linkedlist->delete(4));
        $this->assertEquals(4, $this->linkedlist->getLen());
        $this->assertEquals('MM', $this->linkedlist->get(3));
        $this->assertEquals('II', $this->linkedlist->get(0));
    }

    /**
     * @expectedException Exception
     * @expectExceptionCode -1
     */
    public function testDeleteNagativeError()
    {
        $this->linkedlist->delete(-9);
    }

    /**
     * @expectedException Exception
     * @expectExceptionCode -1
     */
    public function testDeleteExceedError()
    {
        $this->linkedlist->delete(99);
    }
}
