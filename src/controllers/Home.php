<?php

namespace BasicWebsite\Controllers;

use BasicWebsite\Template\Renderer;
use Http\Response;
use Pool\Views\Pool;

class Home
{
    private $response;
    private $poolView;

    function __construct
    (
        Response $response,
        Pool $view
    )
    {
        $this->response = $response;
        $this->poolView = $view;
    }

    public function show()
    {
        $this->response->setContent($this->poolView->showPool());
    }

}