<?php

namespace Tests\DataStrcture;

use DataStructure\LinkedList\SingleLinkedList;

use \PHPUnit\Framework\TestCase;


/**
 * 单链表测试用例
 */
class SingleLinkedListTest extends TestCase
{

    /**
     * 空链表测试
     */
    public function testEmpty()
    {
        $linkedlist = new SingleLinkedList();
        $this->assertEmpty($linkedlist->getLen());
        return $linkedlist;
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
     * @expectedException Exception
     */
    public function testGetNode($linkedlist)
    {
        $node = $linkedlist->getNode(1);
        $this->assertEquals('world', $node->Data);

        $node = $linkedlist->getNode(2);
        $this->assertEquals('!', $node->Data);

        $this->getExpectedException($linkedlist->getNode(-1));
        $this->getExpectedException($linkedlist->getNode(11));
    }

    /**
     * 单链表反转
     */
    public function testReverse()
    {
        $linkedlist = new SingleLinkedList();
        $linkedlist->insert('A');
        $this->assertEquals(true, $linkedlist->reverse());
        $this->assertEquals(1,$linkedlist->getLen());
        $this->assertEquals('A',$linkedlist->get(0));

        $linkedlist->insert('B');
        $this->assertEquals(true, $linkedlist->reverse());
        $this->assertEquals('A',$linkedlist->get(0));
        $this->assertEquals('B',$linkedlist->get(1));

        $linkedlist->insert('C');
        $this->assertEquals(true, $linkedlist->reverse());
        $this->assertEquals('B', $linkedlist->get(0));
        $this->assertEquals('A', $linkedlist->get(1));
        $this->assertEquals('C', $linkedlist->get(2));
    }

    /**
     * @expectedException Exception
     */
    public function testSet()
    {
        $linkedlist = new SingleLinkedList();
        $linkedlist->insert('A');

        $this->assertEquals(true, $linkedlist->set(0, 'Hello'));
        $this->assertEquals('Hello', $linkedlist->get(0));

        $this->assertEquals(true, $linkedlist->set(1, 'PHP'));
        $this->assertEquals('PHP', $linkedlist->get(1));

        $this->assertEquals(1, $linkedlist->getLen());

        $linkedlist->insert('B');
        $this->assertEquals(true, $linkedlist->set(1, 'PHP'));
        $this->assertEquals('PHP', $linkedlist->get(1));
    }

    /**
     * @expectedException Exception
     */
    public function testDelete()
    {
        // one node
        $linkedlist = new SingleLinkedList();
        $linkedlist->insert('A');
        $this->assertEquals(true, $linkedlist->delete(0));
        $this->assertEquals(0, $linkedlist->getLen());

        //three node
        $linkedlist->insert('A');
        $linkedlist->insert('B');
        $linkedlist->insert('C');

        //first node
        $this->assertEquals(true, $linkedlist->delete(0));
        $this->assertEquals(2, $linkedlist->getLen());
        $this->assertEquals('B', $linkedlist->get(0));

        //last node
        $this->assertEquals(true, $linkedlist->delete(1));
        $this->assertEquals(1, $linkedlist->getLen());
        $this->assertEquals('B', $linkedlist->get(0));

        //invalid exception
        $this->getExpectedException($linkedlist->getNode(-1));
        $this->getExpectedException($linkedlist->getNode(11));

    }
}
