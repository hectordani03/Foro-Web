<?php

namespace app\classes;

/* uses de los controladores */

use app\controllers\HomeController as Home;
use app\controllers\PostsController as Posts;
use app\controllers\ErrorController as Error;

class Router
{
    private $uri = "";
    public function __construct()
    {
    }

    public function route()
    {
        $this->filterRequest();
        $controller = $this->getController();
        $action     = $this->getAction();
        $params     = $this->getParams();
        switch ($controller) {
            case 'HomeController':
                $controller = new Home();
                break;
            case 'PostsController':
                $controller = new Posts();
                break;
            default:
                $controller = new Error();
                $action = 'error404';
        }
        $controller->$action($params);
        return;
    }

    private function filterRequest()
    {
        $peticion = filter_input_array(INPUT_GET);
        if (isset($peticion['uri'])) {
            $this->uri = $peticion['uri'];
            $this->uri = rtrim($this->uri, '/');
            $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
            $this->uri = explode("/", ucfirst(strtolower($this->uri)));
            return;
        }
    }

    private function getController()
    {
        if (isset($this->uri[0])) {
            $controller = $this->uri[0];
            unset($this->uri[0]);
        } else {
            $controller = "Home";
        }
        $controller = ucfirst($controller) . 'Controller';
        return $controller;
    }

    private function getAction()
    {
        if (isset($this->uri[1])) {
            $action = $this->uri[1];
            unset($this->uri[1]);
        } else {
            $action = "index";
        }
        return $action;
    }

    private function getParams()
    {
        $params = [];
        if (!empty($this->uri)) {
            $params = $this->uri;
        }
        return $params;
    }
}
