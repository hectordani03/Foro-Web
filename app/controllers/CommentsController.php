<?php

namespace app\controllers;

use app\classes\view;
use app\classes\redirect;
use app\models\posts;
use app\models\comments;
use app\controllers\auth\LoginController as session;

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
            $data['userId'] = session::sessionValidate()['id'];
            $res = $comment->addComment($data);
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
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $comment = new comments;
            $res = $comment->deleteComment($data);
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
        $comment = new comments;
        if (!empty($data)) {
            $data['userId'] = session::sessionValidate()['id'];
            $res = $comment->addReply($data);
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
