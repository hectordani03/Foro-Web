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

    public function createComment($params = null)
    {
        $comment = new comments;
        $res = $comment->addComment(filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS)), $params);
        if ($res === false) {
        } else {
            echo json_encode(["r" => true]);
        }
    }

    public function deleteComt()
    {
        $comment = new comments;
        $res = $comment->deleteComment(filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS)));
        if ($res === false) {
        } else {
            echo json_encode(["r" => true]);
        }
    }

    public function getComments($params = null)
    {
        $comments = new posts();
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
