<?php

namespace BasicWebsite\Menu;

class ArrayMenuReader implements MenuReader {

    public function readMenu() {
        return [
            ['href' => '/', 'text' => 'home'],
            ['href' => '/description', 'text' => 'description'],
        ];
    }

}