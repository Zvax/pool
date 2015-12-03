<?php

namespace BasicWebsite\Pages;

use Exception;

class InvalidPageException extends Exception {
    public function __construct($slug, $code = 0, Exception $previous = null) {
        $message = "No page with the $slug name was found";
        parent::__construct($message,$code,$previous);
    }
}