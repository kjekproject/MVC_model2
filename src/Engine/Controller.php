<?php

namespace MVC_model2\Engine;

abstract class Controller {
    
    /**
     * Redirect to the given URL
     * @param string $url URL to redirection
     */
    public function redirect($url) {
        header("location: " . $url);
    }
}