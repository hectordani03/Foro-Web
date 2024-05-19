<?php

namespace app\controllers;

use app\classes\View;
use app\controllers\auth\LoginController as session;


class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $response = [
            'ua' => session::sessionValidate() ?? ['sv' => false],
            'title' => 'For Us',
            'code' => 200
        ];
        View::render('admin/dashboard', $response);
    }
}
