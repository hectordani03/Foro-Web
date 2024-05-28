<?php

namespace app\controllers;

use app\classes\view;
use app\classes\redirect;
use app\models\log;
use app\models\comments;
use app\controllers\auth\LoginController as session;
use app\models\interactions as Inter;
use app\models\Intercomts;
use app\models\Interposts;

class CommentsController extends Controller
{
    public function index($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        view::render('admin/comments', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function createComment()
    {
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $comment = new comments;
            $Inter = new Inter;
            $Interposts = new Interposts;
            $data['userId'] = session::sessionValidate()['id'];
            $res = $comment->addComment($data);
            $data['type'] = 'comment';
            $res2 = $Inter->addInteraction($data);
            $data['interId'] = $res2;
            $res3 = $Interposts->interPost($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function deleteComt()
    {
        $log = new log;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $comment = new comments;
            $res = $comment->deleteComment($data);
            if (isset($data['action']) && !empty($data['action'])) {
                $data['idUser'] = session::sessionValidate()['id'];
                $log->logActions($data);
            }
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function replyComment()
    {
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $comment = new comments;
            $Inter = new Inter;
            $Intercomts = new Intercomts;
            $data['userId'] = session::sessionValidate()['id'];
            $res = $comment->addReply($data);
            $data['type'] = 'reply';
            $res2 = $Inter->addInteraction($data);
            $data['interId'] = $res2;
            $res3 = $Intercomts->InterComt($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function getComments($params = null)
    {
        $comments = new comments();
        $result = $comments->getPostComments($params);
        echo $result;
    }

    public function getAllComments()
    {
        $comments = new comments();
        $result = $comments->getComments();
        echo $result;
    }
}
