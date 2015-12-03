<?php

namespace BasicWebsite\Pages;

interface PageReader {
    public function readBySlug($slug);
}