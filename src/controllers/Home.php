<?php

namespace BasicWebsite\Controllers;

use Http\Response;
use Pool\View\Pool;

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