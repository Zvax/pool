<?php

namespace Application;

use Auryn\Injector;

class Engine
{
    private $injector;
    private $executableList;

    public function __construct(Injector $injector,ExecutableList $list)
    {
        $this->injector = $injector;
        $this->executableList = $list;
    }


    public function execute()
    {
        foreach ($this->executableList as $step)
        {
            $this->injector->execute($step);
        }
    }

}