<?php

namespace Application;

class Step
{
    private $stepCallable;

    public function __construct($nextCallable)
    {
        $this->stepCallable = $nextCallable;
    }

    public function getCallable()
    {
        return $this->stepCallable;
    }

}