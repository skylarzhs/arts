<?php

namespace Tests\DataStrcture;

use DataStructure\LinkedList\SingleLinkedList;

use \PHPUnit\Framework\TestCase;

class SingleLinkedListTest extends TestCase
{
    private $linkedlist;

    public function setUp()
    {
        $this->linkedlist = new SingleLinkedList();
        parent::setUp();
    }

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
     */
    public function testGetNode($linkedlist)
    {
        $node = $linkedlist->getNode(1);
        $this->assertEquals('world', $node->Data);

        $node = $linkedlist->getNode(2);
        $this->assertEquals('!', $node->Data);
    }

    /**
     * @depends testInsert
     */
    public function testReverse($linkedlist)
    {
        $this->assertEquals(3, $linkedlist->getLen());
        $this->assertEquals(true, $linkedlist->reverse());
        $this->assertEquals('Hello', $linkedlist->get(2));
        $this->assertEquals('world', $linkedlist->get(1));
        $this->assertEquals('!', $linkedlist->get(0));
    }
    /**
     * @depends testInsert
     */
    public function testSet($linkedlist)
    {
        
        $this->assertEquals(true, $linkedlist->set(0, 'Hello'));
        $this->assertEquals('Hello', $linkedlist->get(0));

        $this->assertEquals(true, $linkedlist->set(1, 'PHP'));
        $this->assertEquals('PHP', $linkedlist->get(1));

        $this->assertEquals(3, $linkedlist->getLen());
    }

    /**
     * @depends testInsert
     */
    public function testDelete($linkedlist)
    {
        $this->assertEquals(true, $linkedlist->delete(0));//头结点
        $this->assertEquals(2, $linkedlist->getLen());
        $this->assertEquals('PHP', $linkedlist->get(0));
        $this->assertEquals(true, $linkedlist->delete(1));//尾结点
        $this->assertEquals(1, $linkedlist->getLen());
        $this->assertEquals('PHP', $linkedlist->get(0));
    }
}
