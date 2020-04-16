<?php

namespace DataStructure\LinkedList;

use Exception;

use DataStructure\LinkedList\SingleNode;

/**
 * 单向链表
 */
class SingleLinkedList
{
    private $head;
    private $len;

    /**
     * 初始化头结点
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * 设置头结点
     */
    private function setHead(SingleNode $val)
    {
        $this->head = $val;
    }

    /**
     * 获取头结点
     */
    private function getHead()
    {
        return $this->head;
    }

    public function getLen()
    {
        return $this->len;
    }

    private function init()
    {
        $this->head = null;
        $this->len = 0;
    }

    /**
     * 设置某位置的节点数据
     * @param int index
     * @param $data
     * @return bool
     */
    public function set(int $index, $val)
    {
        if ($index >= $this->getLen()) {
            throw new Exception('Node does not exist.', 2);
        }

        if ($index < 0) {
            throw new Exception('Invalid index value.', -1);
        }

        $i = 0;
        $node = $this->getHead();
        while ($node->Next !== NULL && $i < $index) {
            $node = $node->Next;
            $i++;
        }
        $node->Data = $val;
        return true;
    }

    /**
     * 获取某节点数据
     * @param int index
     * @return mixed
     */
    public function get(int $index)
    {
        if ($index < 0) {
            throw new Exception('Invalid index value.', -1);
        }

        if ($index >= $this->getLen()) {
            throw new Exception('Node does not exist.', 2);
        }
        $i = 0;
        $node = $this->getHead();
        while ($node->Next !== NULL && $i < $index) {
            $node = $node->Next;
            $i++;
        }
        return $node->Data;
    }

    /**
     * 在某位置插入节点
     * @param mixed $val
     * @param int index
     * @return bool
     */
    public function insert($val, int $index = 0)
    {
        if ($index < 0 || $index > $this->getLen()) {
            throw new Exception('Invalid index value.');
        }

        $i = 1;
        $node = $this->getHead();

        if ($index == 0) {
            $node = new SingleNode($val, $node);
            $this->setHead($node);
            $this->len++;
            return true;
        }

        while ($node->Next !== NULL && $i < $index) {
            $node = $node->Next;
            $i++;
        }

        $node->Next = new SingleNode($val, $node->Next);
        $this->len++;
        return true;
    }
    /**
     * 删除某位置的节点
     * @param int index
     * @return bool
     */
    public function delete(int $index)
    {
        if ($index < 0) {
            throw new Exception('Invalid index value.', -1);
        }

        if ($index >= $this->getLen()) {
            throw new Exception('Node does not exist.', 2);
        }

        $node = $this->getHead();
        if ($index == 0) {
            if ($this->getLen() == 1) {
                $this->head = null;
            } else {
                $this->setHead($node->Next);
            }
            $this->len--;
            return true;
        }

        $i = 1;
        while ($node->Next !== NULL && $i < $index) {
            $node = $node->Next;
            $i++;
        }
        $node->Next = $node->Next->Next;
        $this->len--;
        return true;
    }

    /**
     * 获取指定节点
     */
    public function getNode(int $index = 0)
    {
        if ($index < 0 || $index > $this->getLen()) {
            throw new Exception('Invalid index value!');
        }
        $i = 0;
        $node = $this->getHead();
        while ($node->Next !== NULL && $i < $index) {
            $node = $node->Next;
            $i++;
        }
        return $node;
    }

    /**
     * reverse single linked list
     */
    public function reverse()
    {
        if ($this->getLen() <= 1) {
            return true;
        }
        $node = $this->getHead();
        $newNode = new SingleNode($node->Data, null);
        while ($node = $node->Next) {
            $newNode = new SingleNode($node->Data, $newNode);
        }
        $newNode = $this->setHead($newNode);
        return true;
    }
}
