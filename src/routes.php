<?php

return [
    ["GET","/players[/]",["Pool\\Controllers\\Players","listPlayers"]],
    ["GET","/players/{id:[0-9]+}",["View\\Players\\Unique","show"]],
    ["GET","/[{slug}]",["Pool\\Controllers\\Pages","show"]],

    ["POST","/players",["Pool\\Controllers\\Players","save"]],
];