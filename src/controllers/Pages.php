<?php

namespace Controllers;

use Application\Step;
use BasicWebsite\Pages\PageReader;
use View\Site;

class Pages
{
    private $pageReader;
    private $siteView;

    public function __construct(PageReader $pageReader, Site $site)
    {
        $this->pageReader = $pageReader;
        $this->siteView = $site;
    }

    public function show($params)
    {
        $slug = isset($params['slug']) ? $params['slug'] : "home";
        $this->siteView->content = $this->pageReader->readBySlug($slug);
        return new Step("View\\Site::show");
    }
}