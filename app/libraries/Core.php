<?php

/*
 * App Core Class
 * Creates URL and lodas core controller
 * URL FORMAT - /controller/method/params
 */

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {

        if ($this->getUrl() !== null) {
            $url = $this->getUrl();

            // Look in controllers if there's one created
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                // If exists, set as controller
                $this->currentController = ucwords($url[0]);
                unset($url[0]);
            }
        }
        
        // Require the controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        $this->currentController = new $this->currentController;
    }

    public function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    } 
}
