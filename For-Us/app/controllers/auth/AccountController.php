<?php

namespace app\controllers\auth;

use app\classes\view;
use app\controllers\Controller;
use app\controllers\auth\LoginController as session;


class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function recover($params = null)
    {
        $response = [
            'ua' => session::sessionValidate() ?? ['sv' => false],
            'title' => "Recover–Account – For Us",
            'code' => 200
        ];
        View::render('user/auth/recover', $response);
    }
}
