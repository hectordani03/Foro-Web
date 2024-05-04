<?php

namespace app\controllers\auth;

use app\classes\view;
use app\controllers\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function recover($params = null)
    {
        $response = [
            'title' => "Recover–Account – For Us",
            'code' => 200
        ];
        View::render('user/auth/recover', $response);
    }
}
