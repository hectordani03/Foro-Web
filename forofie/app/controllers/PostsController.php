<?php

namespace app\controllers;

use app\models\posts;

class PostsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPosts()
    {
        $posts = new posts();
        $posts = $posts->getAllPosts();
        echo json_encode("ok");
    }
}
