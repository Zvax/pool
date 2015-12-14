<?php

namespace Pool\Views;

use Pool\Model\Site;
use Templating\Renderer;

class Pool
{
    private $renderer;
    private $siteView;

    public function __construct
    (
        Site $siteView,
        Renderer $renderer
    )
    {
        $this->siteView = $siteView;
        $this->renderer = $renderer;
    }

    public function showPool()
    {
        return $this->renderer->render('layout', $this->siteView);
    }

}