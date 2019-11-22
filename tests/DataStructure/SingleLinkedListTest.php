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

    public function testInsert()
    {
        $this->linkedlist->insert('skylar');
        $this->assertEquals('skylar', $this->linkedlist->get(1));
    }

    public function testSet()
    {
        $this->linkedlist->set(1, 'one');
        $this->assertEquals('one', $this->linkedlist->get(1));
    }

    public function testDelete()
    {
        $this->linkedlist->delete(1);
        $this->assertEmpty($this->linkedlist->getLen());
    }

    public function testEmpty()
    {
        $this->assertEmpty($this->linkedlist->getLen());
        return $this->linkedlist;
    }

    /**
     * @depends testEmpty
     */
    public function testInsert2($linkedlist)
    {
        $linkedlist->insert('notempty');
        $this->assertNotEmpty($linkedlist->getLen());
        $this->assertEquals('notempty', $linkedlist->get(1));
        return $linkedlist;
    }

    /**
     * @depends testInsert2
     */
    public function testDelete2($linkedlist)
    {
        $this->assertEquals(true, $linkedlist->delete(1));
        $this->assertEmpty($linkedlist->getLen());
        $this->assertEquals(null, $linkedlist->get(1));
    }
}
