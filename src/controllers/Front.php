<?php

namespace Pool\Controllers;

use Pool\Model\Params;

class Front
{
    private $poolParams;

    public function __construct(Params $params)
    {
        $this->poolParams = $params;
    }

    public function dispatch($params)
    {
        if (isset($params['slug']))
        {
            $slug = $params['slug'];
            switch ($slug)
            {
                case 'players':
                    $this->poolParams->section = 'players';
                    break;
                default:
                    $this->poolParams->section = 'pages';
                    $this->poolParams->slug = $slug;
            }
        }
    }
}