<?php

return [
    ["GET","/players[/]",["\\Controllers\\Players","listPlayers"]],
    ["GET","/players/{id:[0-9]+}",["View\\Players\\Unique","show"]],
    ["GET","/players/{action}/{id:[0-9]+}",["View\\Players\\Unique","show"]],
    ["GET","/[{slug}]",["\\Controllers\\Pages","show"]],

    ["POST","/players",["\\Controllers\\Players","save"]],
];