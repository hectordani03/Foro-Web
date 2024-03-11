<?php

namespace app\models;

class viewsModel {
    //get value from viewsController = url name
    protected function getModelViews($views)
    {

        $whiteList = ["dashboard", "user", "userNew", "userList", "userUpdate", "userSearch", "userPhoto", "logOut", "post", "comment", "register", "recover", "index", "profile"];;
        if (in_array($views, $whiteList)) {
            if (is_file("./app/views/adminviews/" . $views . "-view.php")) {
                $content = "./app/views/adminviews/" . $views . "-view.php";
            } elseif (is_file("./app/views/content/" . $views . ".php")) {
                $content = "./app/views/content/" . $views . ".php";
            } elseif (is_file("./app/views/userViews/" . $views . ".php")) {
                $content = "./app/views/userViews/" . $views . ".php";
            }else {
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
