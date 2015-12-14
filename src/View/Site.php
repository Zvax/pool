<?php

namespace View;

use BasicWebsite\Menu\MenuReader;
use Http\Response;
use Templating\Renderer;

class Site
{
    public $title = "Pool Manager";
    public $content;
    public $menuItems = [];

    private $renderer;
    private $response;

    public function __construct(MenuReader $menuReader,Renderer $renderer, Response $response)
    {
        $this->renderer = $renderer;
        $this->response = $response;
        $this->menuItems = $menuReader->readMenu();
    }

    public function show()
    {
        $this->response->setContent($this->renderer->render('layout',$this));
    }
}