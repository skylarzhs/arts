<?php

namespace DataStructure\LinkedList;
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
    public function setHead(Node $val)
    {
        $this->head = $val;
    }

    /**
     * 获取头结点
     */
    public function getHead()
    {
        return $this->head;
    }

    public function getLen()
    {
        return $this->len;
    }

    public function init()
    {
        $this->setHead(new Node(NULL, NULL));
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
        $i = 1;
        $node = $this->getHead();
        while ($node->Next !== NULL && $i <= $index) {
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
        $i = 1;
        $node = $this->getHead();
        while ($node->Next !== NULL && $i <= $index) {
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
            return false;
        }
        $i = 1;
        $node = $this->getHead();

        while ($node->Next !== NULL && $i < $index) {
            $node = $node->Next;
            $i++;
        }
        $node->Next = new Node($val, $node->Next);
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
        if ($index <= 0 || $index > $this->getLen()) {
            return false;
        }
        $i = 1;
        $node = $this->getHead();
        while ($node->Next !== NULL) {
            if ($i == $index) break;
            $node = $node->Next;
            $i++;
        }
        $node->Next = $node->Next->Next;
        $this->len--;
        return true;
    }
}

/**
 * 节点
 */
class Node
{
    public $Data;
    public $Next;

    public function __construct($data, $next)
    {
        $this->Data = $data;
        $this->Next = $next;
    }
    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            return NULL;
        }
    }
}
