<?php

namespace Pool\Controllers;

use Application\Step;
use BasicWebsite\Pages\PageReader;
use Pool\Model\Params;
use View\Site;

class Pages
{
    private $pageReader;
    private $siteView;
    private $siteParams;

    public function __construct(PageReader $pageReader, Site $site, Params $siteParams)
    {
        $this->pageReader = $pageReader;
        $this->siteView = $site;
        $this->siteParams = $siteParams;
    }

    public function show($params)
    {
        $this->siteView->content = $this->pageReader->readBySlug($params['slug']);
        return new Step("View\\Site::show");
    }
}