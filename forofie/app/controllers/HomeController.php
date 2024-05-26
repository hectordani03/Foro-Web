<?php

namespace app\controllers;

use app\classes\View;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $response = [
            'title' => 'Foro FIE',
            'code' => 200
        ];
        View::render('home', $response);
    }
}
