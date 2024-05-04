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
            'title' => 'Page not found – For Us',
            'code' => 404
        ];
        View::render('user/404', $response);
    }
}
