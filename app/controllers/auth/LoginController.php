<?php

namespace app\controllers\auth;

use app\controllers\Controller;
use app\classes\View;
use app\models\user;
use app\classes\Redirect;
use app\models\suspensions as sp;
use app\models\reportuser;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $response = [
            'title' => "Account – For Us",
            'code' => 200
        ];
        View::render('user/auth/login', $response);
    }

    public function login()
    {
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        $user = new user;
        $report = new reportUser;
        $sp = new sp;

        if (!empty($data['email']) && !empty($data['password'])) {
            $stmt = $user
                ->select(['a.*, b.profilePic, b.age, b.nacionality, b.description, b.background_color, c.period, c.duration'])
                ->join('userinfo b', 'a.id=b.userId')
                ->join('suspensions c', 'a.id=c.userId', 'LEFT')
                ->where([["a.email", $data['email']]])
                ->get();
            $userData = json_decode($stmt);

            if (count($userData) > 0) {
                $CT = date("Y-m-d H:i:s");
                if ($CT >= $userData[0]->period && $userData[0]->duration != "0") {
                    if ($userData[0]->active != 1) {
                        $data['userId'] = $userData[0]->id;
                        $data['active'] = 1;
                        $r = $report->deleteReportUser($data);
                        $r = $sp->deleteSuspension($data);
                        $r = $user->updateUserStatus($data);
                    }
                    if (password_verify($data['password'], $userData[0]->password)) {
                        echo $this->sessionStart($userData);
                    } else {
                        self::sessionDestroy();
                        echo json_encode(["r" => 'd']);
                    }
                } else {
                    self::sessionDestroy();
                    echo json_encode(["r" => 's']);
                }
            } else {
                self::sessionDestroy();
                echo json_encode(["r" => 'd']);
            }
        } else {
            self::sessionDestroy();
            echo json_encode(["r" => 'e']);
        }
    }

    private function sessionStart($data)
    {
        session_start();
        $_SESSION['sv'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['id'] = $data[0]->id;
        $_SESSION['username'] = $data[0]->username;
        // $_SESSION['password'] = $data[0]->password;
        $_SESSION['email'] = $data[0]->email;
        $_SESSION['role'] = $data[0]->role;
        $_SESSION['profilePic'] = $data[0]->profilePic;
        $_SESSION['age'] = $data[0]->age;
        $_SESSION['nacionality'] = $data[0]->nacionality;
        $_SESSION['description'] = $data[0]->description;
        $_SESSION['background_color'] = $data[0]->background_color;
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
                return ['sv' => $data['sv'], 'id' => $data['id'], 'username' => $data['username'], 'email' => $data['email'], 'role' => $data['role'], 'profilePic' => $data['profilePic'], 'age' => $data['age'], 'nacionality' => $data['nacionality'], 'description' => $data['description'], 'background_color' => $data['background_color']];
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
