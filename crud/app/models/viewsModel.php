<?php

namespace app\models;

class viewsModel {

    #get value from viewsController = url name
    protected function getModelViews($views)
    {

        $whiteList = ["dashboard"];
        if (in_array($views, $whiteList)) {
            if (is_file("./app/views/content/" . $views . "-view.php")) {
                $content = "./app/views/content/" . $views . "-view.php";
            } else {
                $content = "404";
            }
        } elseif ($views == "login" || $views == "index") {
            $content = "login";
        } else {
            $content = "404";
        }
        return $content;
    }
}
