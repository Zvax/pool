<?php

namespace Pool\Views;

use BasicWebsite\Menu\MenuReader;
use BasicWebsite\Pages\PageReader;
use Templating\Renderer;

class Pool implements MainView
{
    private $renderer;
    private $menuReader;
    private $pageReader;
    private $params;

    private $content = 'Default Content';
    private $title = 'Pool Manager';

    public function __construct(Renderer $renderer,MenuReader $menuReader,PageReader $pageReader)
    {
        $this->renderer = $renderer;
        $this->menuReader = $menuReader;
        $this->pageReader = $pageReader;
    }

    public function showPool(array $params = []) {
        $this->params = $params;
        return $this->renderer->render('layout',$this);
    }

    public function content()
    {
        if (isset($this->params['slug'])) {
            $this->content = $this->pageReader->readBySlug($this->params['slug']);
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