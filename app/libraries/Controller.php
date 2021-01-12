<?php

/*
 * Base Controller
 * Loads the models and views
 */

class Controller {
    public function model($model) {
        // Require model file
        require_once '../models/' . $model . '.php';

        // Instantiate model
        return new $model;
    }

    public function view($view, $data = []) {
        // Check for view file
        if (file_exists('../views' . $view . '.php')) {
            require_once '../views' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
