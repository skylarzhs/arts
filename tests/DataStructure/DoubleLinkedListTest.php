<?php

namespace Tests\DataStrcture;

use DataStructure\LinkedList\DoubleLinkedList;

use \PHPUnit\Framework\TestCase;

class DoubleLinkedListTest extends TestCase
{
    private $linkedlist;

    public function setUp()
    {
        $this->linkedlist = new DoubleLinkedList();
        parent::setUp();
    }

    public function testInsert()
    {
        $this->linkedlist->insert('skylar');
        $this->assertEquals('skylar', $this->linkedlist->get(1));
    }

    // public function testSet()
    // {
    //     $this->linkedlist->set(1, 'one');
    //     $this->assertEquals('one', $this->linkedlist->get(1));
    // }

    // public function testDelete()
    // {
    //     $this->linkedlist->delete(1);
    //     $this->assertEmpty($this->linkedlist->getLen());
    // }
}
