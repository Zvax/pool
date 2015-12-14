<?php

namespace Pool\Controllers;

use BasicWebsite\Pages\PageReader;
use Pool\Model\Params;
use Pool\Model\Site;

class Pages
{
    private $pageReader;
    private $siteModel;
    private $siteParams;

    public function __construct(PageReader $pageReader,Site $siteModel,Params $siteParams)
    {
        $this->pageReader = $pageReader;
        $this->siteModel = $siteModel;
        $this->siteParams = $siteParams;
    }

    public function show($params)
    {
        $this->siteModel->content = $this->pageReader->readBySlug($params['slug']);
    }
}