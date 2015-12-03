<?php

namespace Pool\Views;

interface MainView {
    /**
     * @return string
     */
    public function title();
    /**
     * @return array
     */
    public function menuItems();

    /**
     * @return string
     */
    public function content();
}