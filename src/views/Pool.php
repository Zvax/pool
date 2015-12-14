<?php

namespace Pool\Views;

use BasicWebsite\Menu\MenuReader;
use BasicWebsite\Pages\PageReader;
use Pool\Model\Params;
use Pool\Views\Players\ListView;
use Templating\Renderer;

class Pool implements MainView
{
    private $renderer;
    private $menuReader;
    private $pageReader;
    private $params;
    private $playerListView;

    private $content = 'Default Content';
    private $title = 'Pool Manager';

    public function __construct
    (
        Renderer $renderer,
        MenuReader $menuReader,
        PageReader $pageReader,
        Params $params,
        ListView $playerListView
    )
    {
        $this->renderer = $renderer;
        $this->menuReader = $menuReader;
        $this->pageReader = $pageReader;
        $this->params = $params;
        $this->playerListView = $playerListView;
    }

    public function showPool() {
        return $this->renderer->render('layout',$this);
    }

    public function content()
    {

        switch ($this->params->section)
        {
            case 'players':
                return $this->renderer->render('players/list',$this->playerListView);
            case 'pages':
                return $this->pageReader->readBySlug($this->params->slug);
        }

        return $this->content;
    }

    public function title()
    {
        return $this->title;
    }

    public function menuItems()
    {
        return $this->menuReader->readMenu();
    }
}