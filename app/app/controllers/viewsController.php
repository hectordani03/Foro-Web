<?php

namespace app\controllers;

use app\models\viewsModel;

class viewsController extends viewsModel {

    // if empty, redirect login; else get name from url and process with getModelViews
    public function getViewsController($view) {
        if ($view != "") {
            $answer = $this->getModelViews($view);
        } else {
            $answer = "login";
        }
        return $answer;
    }
}