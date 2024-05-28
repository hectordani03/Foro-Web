<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\models\interactions as Inter;
use app\models\interposts as Interposts;
use app\models\intercomts as intercomts;
use app\controllers\auth\LoginController as session;
use app\models\categories as cat;
use app\models\log;

class InteractionsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function createLike()
    {
        $Inter = new Inter;
        $InterPosts = new InterPosts;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['userId'] = session::sessionValidate()['id'];
            $stmt = $Inter
                ->select(['a.id,a.userId, a.type, b.postId, b.interId'])
                ->join('interposts b', 'a.id=b.interId')
                ->where([["b.postId", $data['postId']], ["a.userId", $data['userId']]])
                ->get();
            $interData = json_decode($stmt);
            if (count($interData) > 0) {
                $data['interId'] = $interData[0]->id;
                $res = $Inter->deleteLike($data);
                if ($res === false) {
                } else {
                    echo json_encode(["r" => 'd']);
                }
            } else {
                $res = $Inter->addInteraction($data);
                $data['interId'] = $res;
                $res2 = $InterPosts->interPost($data);
                if ($res === false || $res2 === false) {
                } else {
                    echo json_encode(["r" => 'i']);
                }
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function getNotifications()
    {
        $userId = session::sessionValidate()['id'];
        $Inter = new Inter;
        $result = $Inter->getUserNotifications($userId);
        echo $result;
    }

    public function getNotificationCount()
    {
        $userId = session::sessionValidate()['id'];
        $Inter = new Inter;
        $result = $Inter->countUserNotifications($userId);
        echo $result;
    }

    public function updateUserNotifications(){
        $Interposts = new Interposts;
        $intercomts = new intercomts;

        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['userId'] = session::sessionValidate()['id'];

            $stmt = $Interposts
                ->select(['interId'])
                ->where([["userId", $data['userId']], ["seen", 0]])
                ->get();
            $interPostsData = json_decode($stmt);

            $stmt = $intercomts
                ->select(['interId'])
                ->where([["userId", $data['userId']], ["seen", 0]])
                ->get();
            $interComtsData = json_decode($stmt);


            if (count($interPostsData) > 0) {
                $res = $Interposts->notificationSeen($data);
            } else {
                echo json_encode(["r" => 'n']);  
            }
            if (count($interComtsData) > 0) {
                $res2 = $intercomts->notificationSeen($data);
            } else {
                echo json_encode(["r" => 'n']);  
            }

        } else {
            redirect::to('');
            exit();
        }
    }
}
