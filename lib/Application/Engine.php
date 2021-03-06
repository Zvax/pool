<?php

namespace Application;

use Auryn\Injector;

class Engine
{
    private $injector;
    private $executableList;

    public function __construct(Injector $injector,Step $nextStep)
    {
        $this->injector = $injector;
        $this->executableList = new ExecutableList();
        $this->executableList->addStep($nextStep);
    }


    public function execute()
    {
        /** @var Step $step */
        foreach ($this->executableList as $step)
        {
            $callable = $step->getCallable();

            if (is_array($callable))
            {
                $result = $this->injector->execute($callable[0],$callable[1]);
            }
            else
            {
                $result = $this->injector->execute($callable);
            }

            if ($result instanceof  Step)
            {
                $this->executableList->addStep($result);
            }
        }
    }

}