<?php

return [
    ["GET","/[{slug}]",["Pool\\Controllers\\Front","dispatch"]],

    ["POST","/players",["Pool\\Controllers\\Players","sauver"]],
];