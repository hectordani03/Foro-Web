<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\models\posts;
use app\controllers\auth\LoginController as session;
use app\models\categories as cat;

class PostsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/posts', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function category($params = null)
    {
        $cat = new cat;
        $stmt = $cat->get();
        $categories = json_decode($stmt);
        $peticion = filter_input_array(INPUT_GET);

        $categoryExists = false;
        foreach ($categories as $category) {
            if ($category->name == $peticion['category']) {
                $categoryExists = true;
                break;
            }
        }
        if (isset($peticion['category']) && $peticion['category'] != "" && $categoryExists == true) {
            $response = [
                'ua' => session::sessionValidate() ?? ['sv' => false],
                'title' => 'For Us',
                'code' => 200
            ];
            View::render('user/postsByCategory', $response);
        } else {

            redirect::to('');
            exit();
        }
    }

    public function createPosts()
    {
        $posts = new posts;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['userId'] = session::sessionValidate()['id'];
            $res = $posts->addPosts($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function sharePost()
    {
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $posts = new posts;
            $data['userId'] = session::sessionValidate()['id'];
            $res = $posts->sharePost($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function deletePost()
    {
        $posts = new posts;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $res = $posts->deletePost($data);
            if ($res === false) {
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
        $posts = new posts();
        $result = $posts->getAllPosts();
        echo $result;
    }

    public function getPostsByCategory()
    {
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $category = $_GET['category'];
            $posts = new posts();
            $result = $posts->getPostsByCategory($category);
            echo $result;
        } else {
            redirect::to('');
            exit();
        }
    }
}
