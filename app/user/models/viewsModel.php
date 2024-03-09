<?php

namespace user\models;

class viewsModel
{
    //get value from viewsController = url name
    protected function getModelViews($views)
    {
        $whiteList = ["dashboard", "userNew", "userList", "userUpdate", "userSearch", "userPhoto", "post", "comment"];

        if (in_array($views, $whiteList)) {
            if (is_file("./user/views/adminviews/" . $views . "-view.php")) {
                $content = "./user/views/adminviews/" . $views . "-view.php";
            } elseif (is_file("./user/views/content/404.php")) {
                $content = "./user/views/content/404.php";
            }
            // elseif (is_file("./user/views/content/" . $views . ".php")) {
            //     $content = "./user/views/content/" . $views . ".php";
            // } elseif (is_file("./user/views/userviews/" . $views . ".php")) {
            //     $content = "./user/views/userviews/" . $views . ".php";
            // }
            else {
                $content = "404";
            }
        } elseif ($views == "index") {
            $content = "index";
        } else {
            $content = "404";
        }
        return $content;
    }

    protected function getModelViewsuser($views)
    {
        $whiteList = ["card", "register", "recover", "login"];
        if (in_array($views, $whiteList)) {

            if (is_file("./views/content/" . $views . ".php")) {
                $content = "./views/content/" . $views . ".php";
            } elseif (is_file("./views/userviews/" . $views . ".php")) {
                $content = "./views/userviews/" . $views . ".php";
            } else {
                $content = "404";
            }
        } elseif ($views == "login" || $views == "index") {
            $content = "index";
        } else {
            $content = "404";
        }
        return $content;
    }
}
