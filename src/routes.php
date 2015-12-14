<?php

return [
    ["GET","/players",["Pool\\Controllers\\Players","listPlayers"]],
    ["GET","/players/{id:[0-9]+}",["Pool\\Controllers\\Players","showOne"]],
    ["GET","/[{slug}]",["Pool\\Controllers\\Pages","show"]],

    ["POST","/players",["Pool\\Controllers\\Players","save"]],
];