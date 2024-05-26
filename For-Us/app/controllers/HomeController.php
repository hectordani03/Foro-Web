<?php

namespace app\controllers;

use app\classes\view;
use app\classes\redirect;
use app\controllers\auth\LoginController as session;

class HomeController extends Controller
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
        view::render('user/home', $response);
    }

    public function dashboard($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        view::render('admin/dashboard', ['ua' => $ua, 'title' => 'For Us']);
    }
}
