<?php

namespace app\controllers\auth;

use app\classes\redirect;
use app\controllers\Controller;
use app\classes\View;
use app\models\user;
use app\models\userinfo;
use app\models\log;
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
        $log = new log;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $res = $user->registerUser($data);
            $res2 = $userinfo->registerUserInfo($res);
            ob_start();
            require_once '../app/views/templates/emails/registerUser.php';
            $message = ob_get_clean();
            $subject = "Welcome " . $data['username'];
            if (isset($data['action']) && !empty($data['action'])) {
                $data['idUser'] = session::sessionValidate()['id'];
                $log->logActions($data);
            }
            if ($res === false && $res2 === false) {
            } else {
                sendMail($data['email'], $subject, $message);
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }
}
