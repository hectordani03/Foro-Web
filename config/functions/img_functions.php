<?php

function getUserImg($file)
{
    $timestamp = time();
    if (isset($_FILES[$file]) && $_FILES[$file]['name'] != "" && $_FILES[$file]['size'] > 0 && $_FILES[$file] != "") {
        $img_dir = "../public/resources/assets/img/profile/";
        if (!file_exists($img_dir)) {
            if (!mkdir($img_dir, 0777)) {
                echo json_encode(["r" => 'i']);
                return false;
            }
        }

        if (mime_content_type($_FILES[$file]['tmp_name']) != "image/jpeg" && mime_content_type($_FILES[$file]['tmp_name']) != "image/png") {
            echo json_encode(["r" => 'i']);
            return false;
        }

        if (($_FILES[$file]['size'] / 1024) > 1025) {
            echo json_encode(["r" => 'i']);
            return false;
        }

        if ($_SESSION['profilePic'] != "" && $_SESSION['profilePic'] == "default.jpg" || $_SESSION['profilePic'] == "default.png") {
            $img = str_ireplace(" ", "_", $_SESSION['username']);
            $img = $img . "_" . $timestamp . $_SESSION['id'];
        } elseif ($_SESSION['profilePic'] != "") {
            $img = explode(".", $_SESSION['profilePic']);
            $img = $img[0];
        } else {
            $img = str_ireplace(" ", "_", $_SESSION['username']);
            $img = $img . "_" . $timestamp . $_SESSION['id'];
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
            echo json_encode(["r" => 'i']);
            return false;
        }

        if (is_file($img_dir . $_SESSION['profilePic']) && $_SESSION['profilePic'] != $img && ($_SESSION['profilePic'] != "default.jpg" && $_SESSION['profilePic'] != "default.png")) {
            chmod($img_dir . $_SESSION['profilePic'], 0777);
            unlink($img_dir . $_SESSION['profilePic']);
        }
    } elseif ($_SESSION['profilePic'] != "" && $_SESSION['profilePic'] != "default.jpg" || $_SESSION['profilePic'] != "default.png") {
        $img = $_SESSION['profilePic'];
    } elseif ($_SESSION['profilePic'] != "") {
        $img = str_ireplace(" ", "_", $_SESSION['username']);
        $img = $img . "_" . $timestamp . $_SESSION['id'];
    }

    return $img;
}

function deleteUserimg($file)
{
    if ($file != 'default.png') {
        if (is_file("../public/resources/assets/img/profile/" . $file)) {
            chmod("../public/resources/assets/img/profile/" . $file, 0777);
            unlink("../public/resources/assets/img/profile/" . $file);
        }
    }
}

function getPostImg($file)
{
    if (isset($_FILES[$file]) && $_FILES[$file]['name'] != "" && $_FILES[$file]['size'] > 0) {
        $img_dir = "../public/resources/assets/img/post/";
        if (!file_exists($img_dir)) {
            if (!mkdir($img_dir, 0777)) {
                echo json_encode(["r" => 'i']);
                return false;
            }
        }

        if (mime_content_type($_FILES[$file]['tmp_name']) != "image/jpeg" && mime_content_type($_FILES[$file]['tmp_name']) != "image/png") {
            echo json_encode(["r" => 'i']);
            return false;
        }

        if (($_FILES[$file]['size'] / 1024) > 5120) {
            echo json_encode(["r" => 'i']);
            return false;
        }
        session_start();
        $img = str_ireplace(" ", "_", $_SESSION['id']);
        session_write_close();
        $timestamp = microtime(true);
        $img = $img . "_" . $timestamp . $_SESSION['id'];

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
            echo json_encode(["r" => 'i']);
            return false;
        }
    } else {
        $img = "";
    }
    return $img;
}

function deletePostimg($file)
{
    if ($file != "") {
        if (is_file("../public/resources/assets/img/post/" . $file)) {
            chmod("../public/resources/assets/img/post/" . $file, 0777);
            unlink("../public/resources/assets/img/post/" . $file);
        }
    }
}

function getCategoryImg($file)
{
    if (isset($_FILES[$file]) && $_FILES[$file]['name'] != "" && $_FILES[$file]['size'] > 0) {
        $img_dir = "../public/resources/assets/img/categories/";
        if (!file_exists($img_dir) && !mkdir($img_dir, 0777, true)) {
            echo json_encode(["r" => 'i']);
            return false;
        }

        $allowed_mime_types = ["image/jpeg", "image/png", "image/gif"];
        $file_mime_type = mime_content_type($_FILES[$file]['tmp_name']);
        if (!in_array($file_mime_type, $allowed_mime_types)) {
            echo json_encode(["r" => 'i']);
            return false;
        }

        if (($_FILES[$file]['size'] / 1024) > 5120) {
            echo json_encode(["r" => 'i']);
            return false;
        }

        $img = pathinfo($_FILES[$file]['name'], PATHINFO_FILENAME);

        switch ($file_mime_type) {
            case 'image/jpeg':
                $img .= ".jpg";
                break;
            case 'image/png':
                $img .= ".png";
                break;
            case 'image/gif':
                $img .= ".gif";
                break;
        }

        chmod($img_dir, 0777);

        if (!move_uploaded_file($_FILES[$file]['tmp_name'], $img_dir . $img)) {
            echo json_encode(["r" => 'i']);
            return false;
        }

        return $img;
    } else {
        echo json_encode(["r" => 'i']);
        return false;
    }
}

function deletecategorytimg($file)
{
    if ($file != "") {
        if (is_file("../public/resources/assets/img/categories/" . $file)) {
            chmod("../public/resources/assets/img/categories/" . $file, 0777);
            unlink("../public/resources/assets/img/categories/" . $file);
        }
    }
}

function checkFiles($file) {
    return isset($_FILES[$file]) && $_FILES[$file]['error'] == UPLOAD_ERR_OK && $_FILES[$file]['size'] > 0;
}
