<?php

namespace app\controllers;

use app\classes\redirect;
use app\models\user;
use app\classes\View;
use app\controllers\auth\LoginController as session;
use app\models\log;

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
        $log = new log;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $res = $user->deleteUser($data);
            $data['action'] = "User deleted";
            $data['idUser'] = session::sessionValidate()['id'];
            $log->logActions($data);
            ob_start();
            require_once '../app/views/templates/emails/delUser.php';
            $subject = 'Your Account has been deleted';
            $message = ob_get_clean();
            if ($res === false) {
            } else {
                sendMail($data['email'], $subject, $message);
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
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

    public function totalUsers()
    {
        $users = new user();
        $limitDate = date('Y-m-d H:i:s', strtotime('-5 days'));
        $oldUsersCount = $users->getTotalUsersUntil($limitDate);
        $newUsersCount = $users->getNewUsers($limitDate);
        $oldUsersCount = json_decode($oldUsersCount);
        $newUsersCount = json_decode($newUsersCount);
        $response = [
            'odlUsers' => $oldUsersCount,
            'newUsers' => $newUsersCount,
        ];

        echo json_encode($response);
    }

    public function helper(){

        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['username'] = session::sessionValidate()['username'];
            $data['email'] = session::sessionValidate()['email'];
            ob_start();
            require_once '../app/views/templates/emails/helper.php';
            $subject = 'For us technical support';
            $message = ob_get_clean();
            sendMail('equiposportx@gmail.com', $subject, $message);
                echo json_encode(["r" => true]);
        } else {
            redirect::to('');
            exit();
        }
    }
}
