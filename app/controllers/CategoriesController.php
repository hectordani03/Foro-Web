<?php

namespace app\controllers;

use app\classes\redirect;
use app\models\categories as cat;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $cat = new cat();
        $result = $cat->getAllCategories();
        echo $result;
    }

    public function getHashtags()
    {
        if (isset($_GET['category']) && !empty($_GET['category'])) {
            $cat = new cat();
            $category = $_GET['category'];
            $result = $cat->getAllHashtags($category);
            echo $result;
        } else {
            redirect::to('');
            exit();
        }
    }
}
