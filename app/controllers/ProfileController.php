<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\models\posts;
use app\models\comments;
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
    
    public function updateUser()
    {
        $user = new user;
        $userinfo = new userinfo;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['userId'] = session::sessionValidate()['id'];
            $res = $user->updateProfUser($data);
            
            $res2 = $userinfo->updateUserInfo($data);
            if ($res === false || $res2 === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function getPosts()
    {
        $posts = new posts;
        $userId = session::sessionValidate()['id'];
        $res = $posts->getUserPosts($userId);
        echo $res;
    }

    public function getComts()
    {
        $comments = new comments;
        $data['userId'] = session::sessionValidate()['id'];
        $res = $comments->getUserComments($data);
        echo $res;
    }

    public function getUser()
    {
        $user = new user;
        $userId = session::sessionValidate()['id'];
        $res = $user->getUserInfo($userId);
        echo $res;
    }

    public function getSharedPosts()
    {
        $posts = new posts;
        $userId = session::sessionValidate()['id'];
        $res = $posts->getUserSharedPosts($userId);
        echo $res;
    }
    
    public function updateColor()
    {
        $ua = session::sessionValidate();
        if (is_null($ua)) {
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit();
        }
    
        $data = json_decode(file_get_contents('php://input'), true);
        $color = $data['color'];
        $userId = $ua['id'];
    
        if ($userId && $color) {
            $userinfo = new userinfo();
            $res = $userinfo->updateUserColor($userId, $color);
    
            if ($res) { 
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al guardar el color']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
        }
    }
}