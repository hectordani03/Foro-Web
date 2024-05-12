<?php

namespace app\controllers\auth;

use app\controllers\Controller;
use app\classes\View;
use app\models\user;
use app\models\userinfo;
use app\controllers\auth\LoginController as session;

class RegisterController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $response = [
            'ua' => session::sessionValidate() ?? ['sv' => false],
            'title' => "Create Account – For Us",
            'code' => 200
        ];
        View::render('user/auth/register', $response);
    }
    
    public function register()
    {
        $user = new user;
        $userinfo = new userinfo;
        $res = $user->registerUser(filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS)));
        $res2 = $userinfo->registerUserInfo($res);
        echo json_encode(["r" => $res]);
    }
   
}
