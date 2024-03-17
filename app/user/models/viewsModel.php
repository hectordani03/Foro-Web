<?php

namespace user\models;

class viewsModel
{
    protected function getModelViews($views)
    {
        $whiteList = ["dashboard", "addpost","users", "userUpdate", "posts", "comments", "reportedpost", "reportedcomt", "reporteduser"];

        if (in_array($views, $whiteList)) {
            if (is_file("./user/views/adminviews/" . $views . "-view.php")) {
                $content = "./user/views/adminviews/" . $views . "-view.php";
            } elseif (is_file("./user/views/content/404.php")) {
                $content = "./user/views/content/404.php";
            } else {
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
