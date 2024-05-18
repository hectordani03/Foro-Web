<?php

namespace app\controllers;

use app\models\user;
use app\classes\View;
use app\controllers\auth\LoginController as session;

class UserController extends Controller
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
        View::render('admin/users', $response);
    }

    public function deleteUser()
    {
        $user = new user;
        $res = $user->deleteUser(filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS)));
        if ($res === false) {
        } else {
            echo json_encode(["r" => true]);
        }
    }

    public function getUsers()
    {
        $users = new user();
        $data['userId'] = session::sessionValidate()['id'];
        $data['roleId'] = session::sessionValidate()['role'];
        $result = $users->getAllUsers($data);
        echo $result;
    }
}
