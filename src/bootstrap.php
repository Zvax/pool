<?php

namespace BasicWebsite;

use Auryn\Injector;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Http\Request;
use Http\Response;

ob_start('ob_gzhandler');

require __DIR__."/../vendor/autoload.php";

/** @var Injector $injector */
$injector = require __DIR__."/../src/injector.php";

/** @var Response $response */
$response = $injector->make('Http\Response');

/** @var Request $request */
$request = $injector->make('Http\Request');

$routesDefinitionsCallback = function(RouteCollector $r) {
    foreach (require __DIR__."/routes.php" as $route) {
        $r->addRoute($route[0],$route[1],$route[2]);
    }
};

$dispatcher = \FastRoute\simpleDispatcher($routesDefinitionsCallback);

$routeInfo = $dispatcher->dispatch($request->getMethod(),$request->getPath());
switch ($routeInfo[0]) {
    case Dispatcher::NOT_FOUND:
        $response->setStatusCode(404);
        $response->setContent('404 - not found');
        break;
    case Dispatcher::METHOD_NOT_ALLOWED:
        $response->setStatusCode(403);
        $response->setContent('403 - not allowed');
        break;
    case Dispatcher::FOUND:
        $response->setStatusCode(200);

        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        $class = $injector->make($className);
        $class->$method($vars);
        break;
}

foreach($response->getHeaders() as $header) {
    header($header,false);
}

echo $response->getContent();

ob_end_flush();