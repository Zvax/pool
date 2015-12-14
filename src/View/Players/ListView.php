<?php

namespace View\Players;

use Model\Mappers\Player;

class ListView
{
    private $playerMapper;

    public function __construct(Player $playerMapper)
    {
        $this->playerMapper = $playerMapper;
    }

    public function getPlayers()
    {
        return $this->playerMapper->getAll();
    }

}