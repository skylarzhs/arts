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
        $this->assertEquals(true, $this->linkedlist->insert('skylar1'));
        $this->assertEquals('skylar1', $this->linkedlist->get(0));

        $this->assertEquals(true, $this->linkedlist->insert('skylar2'));
        $this->assertEquals('skylar2', $this->linkedlist->get(0));

        $this->assertEquals('skylar1', $this->linkedlist->get(1));

        $this->assertEquals(false, $this->linkedlist->insert('skylar3',3));

        $this->assertEquals(true, $this->linkedlist->insert('skylar4',2));
        
        $this->assertEquals('skylar4', $this->linkedlist->get(2));
    }

    /**
     * @depends testInsert
     */
    public function testSet(){

    }


}
