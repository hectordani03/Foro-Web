<?php

namespace app\controllers;

use app\classes\View;

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function error404($params = null)
    {
        $response = [
            'title' => 'Error 404 - Página no encontrada',
            'code' => 404
        ];
        View::render('error404', $response);
    }
}
