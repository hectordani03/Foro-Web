<?php

namespace app\controllers;

use app\classes\redirect;
use app\models\categories as cat;
use app\controllers\auth\LoginController as session;
use app\models\log;

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

    public function totalCategories()
    {
        $cat = new cat();
        $limitDate = date('Y-m-d H:i:s', strtotime('-3 days'));
        $oldCat = $cat->getTotalCategoriesUntil($limitDate);
        $newCat = $cat->getNewCategories($limitDate);
        $oldCat = json_decode($oldCat);
        $newCat = json_decode($newCat);
        $response = [
            'oldCat' => $oldCat,
            'newCat' => $newCat,
        ];

        echo json_encode($response);
    }

    public function createCategory()
    {
        $cat = new cat;
        $log = new log;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $res = $cat->addCategory($data);
            $data['idUser'] = session::sessionValidate()['id'];
            $data['action'] = "Category added";
            $log->logActions($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }

    public function deteleCategory()
    {
        $cat = new cat;
        $log = new log;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if (!empty($data)) {
            $data['idUser'] = session::sessionValidate()['id'];
            $res = $cat->addCategory($data);
            $data['action'] = "Category deleted";
            $log->logActions($data);
            if ($res === false) {
            } else {
                echo json_encode(["r" => true]);
            }
        } else {
            redirect::to('');
            exit();
        }
    }
}
