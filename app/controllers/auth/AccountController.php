<?php

namespace app\controllers\auth;

use app\classes\view;
use app\models\user;
use app\classes\Redirect;
use app\controllers\Controller;
use app\classes\Csrf;

class AccountController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function account($params = null)
    {
        $response = [
            'title' => "Recover–Account – For Us",
        ];
        View::render('user/auth/account',  $response);
    }

    public function getUser()
    {
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        $user = new user;
        if (!empty($data['email'])) {
            $stmt = $user
                ->select(['a.email,a.username, b.period, b.duration'])
                ->join('suspensions b', 'a.id=b.userId', 'LEFT')
                ->where([["a.email", $data['email']]])
                ->get();
            $userData = json_decode($stmt);

            if (count($userData) > 0) {
                $CT = date("Y-m-d H:i:s");
                if ($CT >= $userData[0]->period && $userData[0]->duration != "0") {
                    ob_start();
                    $Csrf = new Csrf;
                    session_start();
                    $_SESSION['token'] = $Csrf->getToken();
                    $_SESSION['code'] = $Csrf->getCode();
                    $_SESSION['emailpw'] = $data['email'];
                    session_write_close();
                    $code = $_SESSION['code'];
                    require_once '../app/views/templates/emails/changePasswd.php';
                    $subject = 'Verification Code';
                    $message = ob_get_clean();
                    sendMail($userData[0]->email, $subject, $message);
                    echo json_encode(["r" => true]);
                } else {
                    echo json_encode(["r" => 's']);
                }
            } else {
                echo json_encode(["r" => 'd']);
            }
        } else {
            echo json_encode(["r" => 'e']);
        }
    }

    public function verify($params = null)
    {
        session_start();
        $token = $_SESSION['token'];
        $code = $_SESSION['code'];
        session_write_close();
        if (!Csrf::validateToken($token) || !Csrf::validateCode($code)) {
            redirect::to('Account/account');
            exit();
        }
        $response = [
            'csrf' => $token,
            'title' => "Recover–Account – For Us",
        ];
        View::render('user/auth/verify', $response);
    }

    public function recover($params = null)
    {
        session_start();
        $token = $_SESSION['token'];
        session_write_close();
        if (!Csrf::validateToken($token)) {
            redirect::to('Account/account');
            exit();
        }
        $response = [
            'csrf' => $token,
            'title' => "Recover–Account – For Us",
            'code' => 200
        ];
        View::render('user/auth/recover', $response);
    }

    public function verifyCode()
    {
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        session_start();
        $code = $_SESSION['code'];
        session_write_close();
        if ($data['code'] === $code) {
            if (!Csrf::validateToken($data['token']) || !Csrf::validateCode($data['code'])) {
                Csrf::unsetToken();
                Csrf::unsetCode();
                echo json_encode(["r" => 'n']);
            } else {
                Csrf::unsetCode();
                echo json_encode(["r" => true]);
            }
        } else {
            echo json_encode(["r" => 'd']);
        }
    }

    public function updatePasswd()
    {
        $user = new user;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {

            if (!Csrf::validateToken($data['token']) ) {
                Csrf::unsetToken();
                echo json_encode(["r" => 'n']);
            } else {
                session_start();
                $data['email'] = $_SESSION['emailpw'];
                session_write_close();

                $res = $user->changePasswd($data);
                if ($res === false) {
                } else {
                    Csrf::unsetToken();
                    echo json_encode(["r" => true]);
                }
            }
        } else {
            redirect::to('');
            exit();
        }
    }
}
