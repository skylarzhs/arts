<?php

namespace DataStructure\LinkedList;

/**
 * 节点
 */
class SingleNode
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
