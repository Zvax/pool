<?php

namespace Pool\Model;

class Player
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
}