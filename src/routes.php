<?php

return [
    ['GET','/[{slug}]',['BasicWebsite\Controllers\Home','show']],

    ['POST','/players',['Pool\Controllers\Players','sauver']],
];