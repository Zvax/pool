<?php

namespace BasicWebsite\Template;

interface Renderer {
    public function render($template, $data = []);
}