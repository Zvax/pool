<?php

namespace BasicWebsite\Controllers;

use BasicWebsite\Template\Renderer;
use Http\Response;
use Pool\Views\Pool;

class Home
{
    private $response;
    private $renderer;
    private $poolView;

    function __construct(
        Response $response,
        Renderer $renderer,
        Pool $view)
    {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->poolView = $view;
    }

    public function show()
    {
        $this->response->setContent($this->renderer->render('layout', $this->poolView));
    }

}