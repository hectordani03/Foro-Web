<?php

function getPostImg($file)
{
    if (isset($_FILES[$file]) && $_FILES[$file]['name'] != "" && $_FILES[$file]['size'] > 0) {
        $img_dir = "../public/resources/assets/img/post/";
        if (!file_exists($img_dir)) {
            if (!mkdir($img_dir, 0777)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "Error creating directory",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
        }

        if (mime_content_type($_FILES[$file]['tmp_name']) != "image/jpeg" && mime_content_type($_FILES[$file]['tmp_name']) != "image/png") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The image you have selected has an invalid format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if (($_FILES[$file]['size'] / 1024) > 5120) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The image you have selected exceeds the allowed weight",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }
        session_start();
        $img = str_ireplace(" ", "_", $_SESSION['id']);
        session_write_close();
        $img = $img . "_" . rand(0, 100);

        switch (mime_content_type($_FILES[$file]['tmp_name'])) {

            case 'image/jpeg':
                $img = $img . ".jpg";
                break;
            case 'image/png':
                $img = $img . ".png";
                break;
        }

        chmod($img_dir, 0777);

        if (!move_uploaded_file($_FILES[$file]['tmp_name'], $img_dir . $img)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "We cannot upload the image to the system at this time",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }
    } else {
        $img = "";
    }
    return $img;
}

function getUserImg($file)
{
    if (isset($_FILES[$file]) && $_FILES[$file]['name'] != "" && $_FILES[$file]['size'] > 0 && $_FILES[$file] != "") {
        $img_dir = "../public/resources/assets/img/profile/";
        if (!file_exists($img_dir)) {
            if (!mkdir($img_dir, 0777)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "Error creating directory",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
        }

        if (mime_content_type($_FILES[$file]['tmp_name']) != "image/jpeg" && mime_content_type($_FILES[$file]['tmp_name']) != "image/png") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The image you have selected has an illegal format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if (($_FILES[$file]['size'] / 1024) > 5120) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The image you have selected exceeds the allowed weight",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($_SESSION['profilePic'] != "" && $_SESSION['profilePic'] == "default.jpg" || $_SESSION['profilePic'] == "default.png") {
            $img = str_ireplace(" ", "_", $_SESSION['username']);
            $img = $img . "_" . rand(0, 100);
        } elseif ($_SESSION['profilePic'] != "") {
            $img = explode(".", $_SESSION['profilePic']);
            $img = $img[0];
        } else {
            $img = str_ireplace(" ", "_", $_SESSION['username']);
            $img = $img . "_" . rand(0, 100);
        }

        switch (mime_content_type($_FILES[$file]['tmp_name'])) {
            case 'image/jpeg':
                $img = $img . ".jpg";
                break;
            case 'image/png':
                $img = $img . ".png";
                break;
        }

        chmod($img_dir, 0777);

        if (!move_uploaded_file($_FILES[$file]['tmp_name'], $img_dir . $img)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "We cannot upload the image to the system at this time.",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if (is_file($img_dir . $_SESSION['profilePic']) && $_SESSION['profilePic'] != $img && ($_SESSION['profilePic'] != "default.jpg" && $_SESSION['profilePic'] != "default.png")) {
            chmod($img_dir . $_SESSION['profilePic'], 0777);
            unlink($img_dir . $_SESSION['profilePic']);
        }
        
    } elseif ($_SESSION['profilePic'] != "" && $_SESSION['profilePic'] != "default.jpg" || $_SESSION['profilePic'] != "default.png") {
        $img = $_SESSION['profilePic'];

    } elseif ($_SESSION['profilePic'] != "") {
        $img = str_ireplace(" ", "_", $_SESSION['username']);
        $img = $img . "_" . rand(0, 100);
    }

    return $img;
}
