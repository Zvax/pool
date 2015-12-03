<?php

namespace Pool\Views;

use BasicWebsite\Menu\MenuReader;
use BasicWebsite\Pages\PageReader;
use BasicWebsite\Template\Renderer;

class Pool
{
    private $renderer;
    private $menuReader;
    private $pageReader;

    public $content = 'Default Content';
    public $title = 'Pool Manager';

    public function __construct(Renderer $renderer,MenuReader $menuReader,PageReader $pageReader)
    {
        $this->renderer = $renderer;
        $this->menuReader = $menuReader;
        $this->pageReader = $pageReader;
    }

    public function showPool(array $params = []) {
        if (isset($params['slug'])) {
            $this->content = $this->pageReader->readBySlug($params['slug']);
        }
        return $this->renderer->render('layout',$this);
    }

    public function menuItems()
    {
        return $this->menuReader->readMenu();
    }
}