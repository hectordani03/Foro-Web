<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\models\posts;
use app\models\user;
use app\models\userinfo;
use app\controllers\auth\LoginController as session;

class ProfileController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $ua = session::sessionValidate();
        if (is_null($ua)) {
            redirect::to('');
            exit();
        }
        View::render('user/profile', ['ua' => $ua, 'title' => 'Profile – For Us']);
    }

    public function user()
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/userUpdate', ['ua' => $ua, 'title' => 'Profile – For Us']);
    }

    public function getPosts($params = null)
    {
        $posts = new posts;
        $res = $posts->getUserPosts($params);
        echo $res;
    }

    public function getUser($params = null)
    {
        $user = new user;
        $res = $user->getUserInfo($params);
        echo $res;
    }

    public function updateUser()
    {

        $user = new user;
        $userinfo = new userinfo;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        $data['userId'] = session::sessionValidate()['id'];
        $res = $userinfo->updateUserInfo($data);
        $res = $user->updateProfUser($data);
        echo json_encode(["r" => $res]);
        // $r = json_encode([$res]);
    }
}
