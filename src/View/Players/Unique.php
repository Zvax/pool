<?php

namespace View\Players;

use Application\Step;
use Pool\Model\Mappers\Player;
use Templating\Renderer;
use View\Site;

class Unique
{
    private $renderer;
    private $siteView;
    private $playerMapper;

    public function __construct(Renderer $renderer,Site $siteView,Player $player)
    {
        $this->renderer = $renderer;
        $this->siteView = $siteView;
        $this->playerMapper = $player;
    }

    public function show($params)
    {
        $player = $this->playerMapper->find($params['id']);

        if (isset($params['action']) && $params['action'] === 'edit')
        {
            $this->siteView->content = $this->renderer->render('players/editForm',$player);
        }
        else
        {
            $this->siteView->content = $this->renderer->render('players/unique',$player);
        }
        return new Step("View\\Site::show");
    }
}