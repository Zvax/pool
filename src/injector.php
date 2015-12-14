<?php

$injector = new \Auryn\Injector();

$injector->alias('Http\Request','Http\HttpRequest');
$injector->alias('Http\Response','Http\HttpResponse');

$injector->share('Http\Request');
$injector->share('Http\Response');

$injector->share("Pool\\Model\\Params");

$injector->define('PDO',[
    ':dsn' => 'sqlite:C:/Users/back_again/pooldb'
]);

$injector->define('Http\Request',[
    ':get' => $_GET,
    ':post' => $_POST,
    ':files' => $_FILES,
    ':cookies' => $_COOKIE,
    ':server' => $_SERVER,
]);

$injector->alias('Templating\Renderer','Templating\PhpTemplatesRenderer');
$injector->share('Templating\Renderer');

$injector->define('Storage\FileLoader',[
    ':root' => __DIR__.'/../templates',
    ':extension' => 'php',
]);

$injector->define('BasicWebsite\Pages\FilePageReader',[
    ':pageFolder' => __DIR__."/../pages",
]);

$injector->alias('BasicWebsite\Pages\PageReader','BasicWebsite\Pages\FilePageReader');
$injector->share('BasicWebsite\Pages\PageReader');

$injector->alias('BasicWebsite\Menu\MenuReader','BasicWebsite\Menu\ArrayMenuReader');
$injector->share('BasicWebsite\Menu\MenuReader');

return $injector;
