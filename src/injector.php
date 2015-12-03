<?php

$injector = new \Auryn\Injector();

$injector->alias('Http\Request','Http\HttpRequest');
$injector->alias('Http\Response','Http\HttpResponse');

$injector->share('Http\Request');
$injector->share('Http\Response');

$injector->define('Http\Request',[
    ':get' => $_GET,
    ':post' => $_POST,
    ':files' => $_FILES,
    ':cookies' => $_COOKIE,
    ':server' => $_SERVER,
]);

$injector->alias('BasicWebsite\Template\Renderer','BasicWebsite\Template\MustacheRenderer');
$injector->share('BasicWebsite\Template\Renderer');

$injector->define('Mustache_Engine',[
    ':options' => [
        'loader'=> new Mustache_Loader_FilesystemLoader(__DIR__."/../templates",[
            'extension' => '.html',
        ]),
    ]
]);

$injector->define('BasicWebsite\Pages\FilePageReader',[
    ':pageFolder' => __DIR__."/../pages",
]);

$injector->alias('BasicWebsite\Pages\PageReader','BasicWebsite\Pages\FilePageReader');
$injector->share('BasicWebsite\Pages\PageReader');

$injector->alias('BasicWebsite\Menu\MenuReader','BasicWebsite\Menu\ArrayMenuReader');
$injector->share('BasicWebsite\Menu\MenuReader');

return $injector;
