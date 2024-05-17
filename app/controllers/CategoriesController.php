<?php

namespace app\controllers;

use app\models\categories as cat;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $cat = new cat();
        $result = $cat->getAllCategories();
        echo $result;
    }
}
