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
        $linkedlist->insert('skylar');
        $this->assertNotEmpty($linkedlist->getLen());
        $this->assertEquals('skylar', $linkedlist->get(0));
        $linkedlist->insert('skylar2');
        $this->assertEquals(2, $linkedlist->getLen());
        $this->assertEquals('skylar2', $linkedlist->get(0));
        $this->assertEquals('skylar', $linkedlist->get(1));
        $linkedlist->insert('skylar3', 2);
        $this->assertEquals(3, $linkedlist->getLen());
        $this->assertEquals('skylar3', $linkedlist->get(2));
        return $linkedlist;
    }

    /**
     * @depends testInsert
     */
    public function testSet($linkedlist)
    {
        $this->assertEquals(true, $linkedlist->set(1, 'jane'));
        $this->assertEquals('jane', $linkedlist->get(1));
        $this->assertEquals(3, $linkedlist->getLen());
    }

    /**
     * @depends testInsert
     */
    public function testDelete($linkedlist)
    {
        $this->assertEquals(true, $linkedlist->delete(0));
        $this->assertEquals(2, $linkedlist->getLen());
        $this->assertEquals('jane', $linkedlist->get(0));
    }
}
