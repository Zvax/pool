<?php

namespace Pool\Model;

use BasicWebsite\Menu\MenuReader;

class Site
{
    public $title = "Pool Manager";
    public $content;
    public $menuItems = [];

    public function __construct(MenuReader $menuReader)
    {
        $this->menuItems = $menuReader->readMenu();
    }
}