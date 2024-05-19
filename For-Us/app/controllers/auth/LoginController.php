<?php

namespace app\controllers\auth;

use app\controllers\suspensionController;
use app\controllers\Controller;
use app\classes\View;
use app\models\user;
use app\classes\Redirect;


class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $response = [
            'ua' => self::sessionValidate() ?? ['sv' => false],
            'title' => "Account – For Us",
            'code' => 200
        ];
        View::render('user/auth/login', $response);
    }

    public function login()
    {
        $data = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $user = new user;
        $stmt = $user
        ->join('userinfo b', 'a.id=b.userId')
        ->where([["a.email", $data['email']]])
        ->get();
        if (count(json_decode($stmt)) > 0) {
            echo $this->sessionStart($stmt);
        } else {
            self::sessionDestroy();
            echo json_encode(["r" => false]);
        }
    }

    private function sessionStart($r)
    {
        $data = json_decode($r);
        session_start();
        $_SESSION['sv'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['id'] = $data[0]->userId;
        $_SESSION['username'] = $data[0]->username;
        // $_SESSION['password'] = $data[0]->password;
        $_SESSION['email'] = $data[0]->email;
        $_SESSION['role'] = $data[0]->role;
        $_SESSION['profilePic'] = $data[0]->profilePic;
        $_SESSION['age'] = $data[0]->age;
        $_SESSION['nacionality'] = $data[0]->nacionality;
        $_SESSION['description'] = $data[0]->description;
        session_write_close();
        return json_encode(["r" => true]);
    }

    public static function sessionValidate()
    {
        $user = new user;
        session_start();
        if (isset($_SESSION['sv']) && $_SESSION['sv'] == true) {
            $data = $_SESSION;
            $stmt = $user->where([["id", $data['id']]])
                ->get();
            if (count(json_decode($stmt)) > 0 && $data['ip'] == $_SERVER['REMOTE_ADDR']) {
                session_write_close();
                return ['sv' => $data['sv'], 'id' => $data['id'], 'username' => $data['username'], 'email' => $data['email'], 'role' => $data['role'], 'profilePic' => $data['profilePic'], 'age' => $data['age'], 'nacionality' => $data['nacionality'], 'description' => $data['description']];
            } else {
                session_write_close();
                self::sessionDestroy();
                return null;
            }
        }
        session_write_close();
        self::sessionDestroy();
        return null;
    }

    private static function sessionDestroy()
    {
        session_start();
        $_SESSION = [];
        $_SESSION['sv'] = false;
        session_destroy();
        session_write_close();
        return;
    }

    public function logout()
    {
        $this->sessionDestroy();
        Redirect::to('login');
        exit();
    }
}
