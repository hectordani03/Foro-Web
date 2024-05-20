<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\models\posts;
use app\controllers\auth\LoginController as session;

class PostsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/posts', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function getPosts()
    {
        $posts = new posts();
        $result = $posts->getAllPosts();
        echo $result;
    }

    public function getPost($params = null)
    {
        $posts = new posts();
        $result = $posts->getPost($params);
        echo $result;
    }

    public function createPosts($params = null)
    {
        $posts = new posts;
        $res = $posts->addPosts(filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS)), $params);
        echo json_encode(["r" => $res]);
    }

    public function sharePost($params = null)
    {
        $posts = new posts;
        $res = $posts->sharePost(filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS)), $params);
        echo json_encode(["r" => $res]);
    }

    // public function addPost()
    // {
    //     session_start();
    //     if (empty($_SESSION['id'])) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "Error",
    //             "text" => "Log in or register to continue viewing the page without interruptions",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }
    //     $content = isset($_POST['content']) ? sanitizeString($_POST['content']) : null;
    //     if ($content == "What's in your mind?") {
    //         $content = "";
    //     }

    //     if (isset($_FILES['post_img']) && isset($_POST['content']) || isset($_POST['category'])) {
    //         $category = sanitizeString($_POST['category']);
    //         $content = $_POST['content'];
    //         $post_img = $_FILES['post_img']['name'];

    //         $emptyFields = array();

    //         if ($content == "" && $post_img == "" || $category == "") {
    //             if ($content == "") {
    //                 $emptyFields[] = "Content";
    //             }
    //             if ($post_img == "") {
    //                 $emptyFields[] = "Image";
    //             }
    //             if ($category == "") {
    //                 $emptyFields[] = "Category";
    //             }

    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The following fields cannot be empty: " . implode(", ", $emptyFields),
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         } elseif (filterString("[a-zA-Z0-9]{4,20}", $content) && filterString("[a-zA-Z0-9]{4,20}", $category)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "Fields do not match the requested format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields do not match the requested format",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }


    //     if (isset($_FILES['post_img']) && $_FILES['post_img']['name'] != "" && $_FILES['post_img']['size'] > 0) {
    //         $img_dir = "../../../assets/post_img/";
    //         if (!file_exists($img_dir)) {
    //             if (!mkdir($img_dir, 0777)) {
    //                 $alert = [
    //                     "type" => "simple",
    //                     "title" => "An unexpected error occurred",
    //                     "text" => "Error creating directory",
    //                     "icon" => "error"
    //                 ];
    //                 return json_encode($alert);
    //                 exit();
    //             }
    //         }

    //         if (mime_content_type($_FILES['post_img']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['post_img']['tmp_name']) != "image/png") {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The image you have selected has an invalid format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }

    //         if (($_FILES['post_img']['size'] / 1024) > 5120) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The image you have selected exceeds the allowed weight",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }

    //         $img = str_ireplace(" ", "_", $_SESSION['id']);
    //         $img = $img . "_" . rand(0, 100);

    //         switch (mime_content_type($_FILES['post_img']['tmp_name'])) {

    //             case 'image/jpeg':
    //                 $img = $img . ".jpg";
    //                 break;
    //             case 'image/png':
    //                 $img = $img . ".png";
    //                 break;
    //         }

    //         chmod($img_dir, 0777);

    //         if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $img_dir . $img)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "We cannot upload the image to the system at this time",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //     } else {
    //         $img = "";
    //     }

    //     $post_data = [
    //         [
    //             "table_field" => "id_posts",
    //             "param" => ":id_posts",
    //             "field_value" => $_SESSION['id']
    //         ],
    //         [
    //             "table_field" => "content",
    //             "param" => ":content",
    //             "field_value" => $content
    //         ],
    //         [
    //             "table_field" => "category",
    //             "param" => ":category",
    //             "field_value" => $category
    //         ],
    //         [
    //             "table_field" => "img",
    //             "param" => ":img",
    //             "field_value" => $img
    //         ],
    //         [
    //             "table_field" => "date",
    //             "param" => ":date",
    //             "field_value" => date("Y-m-d H:i:s")
    //         ],

    //     ];

    //     $addedpost = $this->insertData("posts", $post_data);

    //     if ($addedpost['success']) {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Post added",
    //             "text" => "Post successfully added",
    //             "icon" => "success"
    //         ];
    //     } else {

    //         if (is_file($img_dir . $img)) {
    //             chmod($img_dir . $img, 0777);
    //             unlink($img_dir . $img);
    //         }

    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to add post, please try again",
    //             "icon" => "error"
    //         ];
    //     }

    //     return json_encode($alert);
    // }

    // public function sharePost()
    // {
    //     session_start();
    //     $id_post = sanitizeString($_POST['id_post']);
    //     if (isset($_POST['content']) && isset($_POST['category']) && isset($_FILES['post_img'])) {
    //         $content = sanitizeString($_POST['content']);
    //         $category = sanitizeString($_POST['category']);


    //         if ($content == ""  && $_FILES['post_img']['name'] == "" || $category == "") {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "Fields can not be empty",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         } elseif (filterString("[a-zA-Z0-9]{4,20}", $content) && filterString("[a-zA-Z0-9]{4,20}", $category)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "Fields do not match the requested format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //     } elseif (!isset($_POST['content']) || !isset($_POST['category'])) {
    //         $content = "";
    //         $category = "onu";
    //     }

    //     if (isset($_FILES['post_img']) && $_FILES['post_img']['name'] != "" && $_FILES['post_img']['size'] > 0) {
    //         $img_dir = "../../../assets/post_img/";
    //         if (!file_exists($img_dir)) {
    //             if (!mkdir($img_dir, 0777)) {
    //                 $alert = [
    //                     "type" => "simple",
    //                     "title" => "An unexpected error occurred",
    //                     "text" => "Error creating directory",
    //                     "icon" => "error"
    //                 ];
    //                 return json_encode($alert);
    //                 exit();
    //             }
    //         }

    //         if (mime_content_type($_FILES['post_img']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['post_img']['tmp_name']) != "image/png") {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The image you have selected has an invalid format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }

    //         if (($_FILES['post_img']['size'] / 1024) > 5120) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The image you have selected exceeds the allowed weight",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }

    //         $img = str_ireplace(" ", "_", $_SESSION['id']);
    //         $img = $img . "_" . rand(0, 100);

    //         switch (mime_content_type($_FILES['post_img']['tmp_name'])) {

    //             case 'image/jpeg':
    //                 $img = $img . ".jpg";
    //                 break;
    //             case 'image/png':
    //                 $img = $img . ".png";
    //                 break;
    //         }

    //         chmod($img_dir, 0777);

    //         if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $img_dir . $img)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "We cannot upload the image to the system at this time",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //     } else {
    //         $img = "";
    //     }

    //     $post_data = [
    //         [
    //             "table_field" => "id_posts",
    //             "param" => ":id_posts",
    //             "field_value" => $_SESSION['id']
    //         ],
    //         [
    //             "table_field" => "content",
    //             "param" => ":content",
    //             "field_value" => $content
    //         ],
    //         [
    //             "table_field" => "category",
    //             "param" => ":category",
    //             "field_value" => $category
    //         ],
    //         [
    //             "table_field" => "img",
    //             "param" => ":img",
    //             "field_value" => $img
    //         ],
    //         [
    //             "table_field" => "date",
    //             "param" => ":date",
    //             "field_value" => date("Y-m-d H:i:s")
    //         ],

    //     ];

    //     $sharedpost = $this->insertData("posts", $post_data);

    //     if ($sharedpost['success']) {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Post shared",
    //             "text" => "Post successfully shared",
    //             "icon" => "success"
    //         ];
    //     } else {

    //         if (is_file($img_dir . $img)) {
    //             chmod($img_dir . $img, 0777);
    //             unlink($img_dir . $img);
    //         }

    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to share post, please try again",
    //             "icon" => "error"
    //         ];
    //     }

    //     return json_encode($alert);
    // }

    // public function updatePost()
    // {
    //     session_start();
    //     $id_post = sanitizeString($_POST['id_post']);
    //     $content = sanitizeString($_POST['content']);
    //     $category = sanitizeString($_POST['category']);

    //     $data = $this->run_query("SELECT * FROM posts WHERE id_post = '$id_post' AND id_posts = {$_SESSION['id']}");
    //     if ($data->rowCount() <= 0) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "Unexpected Error",
    //             "text" => "posts or Post not found",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } else {
    //         $data = $data->fetch();
    //     }

    //     if ($content == "" && $category == "" && $_FILES['post_img']['name'] == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif ($content != "") {

    //         if (filterString("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content) && filterString("/^[a-zA-Z]{4,20}$/", $category)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "Fields do not match the requested format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //     }
    //     $img_dir = "../../../assets/post_img/";
    //     if ($_FILES['post_img']['name'] != "" && $_FILES['post_img']['size'] > 0) {
    //         if (!file_exists($img_dir)) {
    //             if (!mkdir($img_dir, 0777)) {
    //                 $alert = [
    //                     "type" => "simple",
    //                     "title" => "An unexpected error occurred",
    //                     "text" => "Error creating directory",
    //                     "icon" => "error"
    //                 ];
    //                 return json_encode($alert);
    //                 exit();
    //             }
    //         }

    //         if (mime_content_type($_FILES['post_img']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['post_img']['tmp_name']) != "image/png") {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The image you have selected has an invalid format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }

    //         if (($_FILES['post_img']['size'] / 1024) > 5120) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "The image you have selected exceeds the allowed weight",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }

    //         $img = str_ireplace(" ", "_", $_SESSION['id']);
    //         $img = $img . "_" . rand(0, 100);

    //         switch (mime_content_type($_FILES['post_img']['tmp_name'])) {

    //             case 'image/jpeg':
    //                 $img = $img . ".jpg";
    //                 break;
    //             case 'image/png':
    //                 $img = $img . ".png";
    //                 break;
    //         }

    //         chmod($img_dir, 0777);

    //         if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $img_dir . $img)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "We cannot upload the image to the system at this time",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //         if (is_file($img_dir . $data['img']) && $data['img'] != $img) {
    //             chmod($img_dir . $data['img'], 0777);
    //             unlink($img_dir . $data['img']);
    //         }
    //     } elseif ($data['img'] != "") {
    //         $img = $data['img'];
    //     }

    //     $post_update_data = [
    //         [
    //             "table_field" => "content",
    //             "param" => ":content",
    //             "field_value" => $content
    //         ],
    //         [
    //             "table_field" => "category",
    //             "param" => ":category",
    //             "field_value" => $category
    //         ],
    //         [
    //             "table_field" => "img",
    //             "param" => ":img",
    //             "field_value" => $img
    //         ]
    //     ];

    //     $condition = [
    //         "field_cond" => "id_post",
    //         "param_cond" => ":id_post",
    //         "cond_value" => $id_post
    //     ];

    //     if ($this->updateData("posts", $post_update_data, $condition)) {

    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Post Updated",
    //             "text" => "Post has been successfully updated",
    //             "icon" => "success"
    //         ];
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to update post, please try again",
    //             "icon" => "error"
    //         ];
    //     }
    //     return json_encode($alert);
    // }

    // public function reportPost()
    // {

    //     $id_post = sanitizeString($_POST['id_post']);
    //     $message = sanitizeString($_POST['content']);
    //     $category = sanitizeString($_POST['category']);
    //     $reason = sanitizeString($_POST['reasonSelect']);

    //     if ($reason == "Other") {
    //         $reason = sanitizeString($_POST['reasonInput']);
    //     }

    //     if ($message == "" || $category == "" || $reason == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif (filterString("[a-zA-Z0-9]{4,20}", $message) && filterString("[a-zA-Z0-9]{4,20}", $category) && filterString("[a-zA-Z0-9]{4,20}", $reason)) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields do not match the requested format",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }

    //     session_start();
    //     $report = [
    //         [
    //             "table_field" => "id_reporting_posts",
    //             "param" => ":ID_reporting_posts",
    //             "field_value" => $_SESSION['id']
    //         ],
    //         [
    //             "table_field" => "reason",
    //             "param" => ":Reason",
    //             "field_value" => $reason
    //         ],
    //         [
    //             "table_field" => "state",
    //             "param" => ":state",
    //             "field_value" => '0'
    //         ]
    //     ];

    //     $ins_report = $this->insertData("reports", $report);

    //     $last_inserted_id_report = $ins_report['lastInsertId'];

    //     $reported = [
    //         [
    //             "table_field" => "id_report",
    //             "param" => ":id_report",
    //             "field_value" => $last_inserted_id_report
    //         ],
    //         [
    //             "table_field" => "id_post",
    //             "param" => ":id_post",
    //             "field_value" => $id_post
    //         ]
    //     ];

    //     $ins_report_post = $this->insertData("reportedposts", $reported);

    //     if ($ins_report['success'] && $ins_report_post['success']) {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Post Reported",
    //             "text" => "Post " . $id_post . " has been reported",
    //             "icon" => "success"
    //         ];
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to report the post" . $id_post,
    //             "icon" => "error"
    //         ];
    //     }
    //     return json_encode($alert);
    // }

    // public function deletePost()
    // {

    //     $id_post = sanitizeString($_POST['id_post']);
    //     $id_report = sanitizeString($_POST['id_report']);
    //     $message = sanitizeString($_POST['content']);
    //     $category = sanitizeString($_POST['category']);
    //     $reason = sanitizeString($_POST['reason']);

    //     if ($message == "" || $category == "" || $reason == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif (filterString("[a-zA-Z0-9]{4,20}", $message) && filterString("[a-zA-Z0-9]{4,20}", $category) && filterString("[a-zA-Z0-9]{4,20}", $reason)) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields do not match the requested format",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }

    //     $info_posts_post = $this->run_query("SELECT * FROM posts INNER JOIN posts ON posts.id_posts = posts.id_posts WHERE posts.id_post = $id_post");
    //     $row = $info_posts_post->fetch();

    //     // SEND EMAIL HERE

    //     $report_update_state = [
    //         [
    //             "table_field" => "state",
    //             "param" => ":state",
    //             "field_value" => '1'
    //         ]
    //     ];

    //     $condition = [
    //         "field_cond" => "id_report",
    //         "param_cond" => ":id_report",
    //         "cond_value" => $id_report
    //     ];

    //     $report_state = $this->updateData("reports", $report_update_state, $condition);

    //     $delete_post = $this->deleteData("posts", "id_post", $id_post);

    //     if ($delete_post->rowCount() == '1') {
    //         if (is_file("../../../assets/post_img/" . $row['img'])) {
    //             chmod("../../../assets/post_img/" . $row['img'], 0777);
    //             unlink("../../../assets/post_img//" . $row['img']);
    //         }
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Post Reported",
    //             "text" => "Post " . $id_post . " has been deleted",
    //             "icon" => "success"
    //         ];
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to delete the post" . $id_post,
    //             "icon" => "error"
    //         ];
    //     }
    //     return json_encode($alert);
    // }

    // public function getPosts($category = null)
    // {
    //     $sql = "SELECT * FROM posts INNER JOIN posts ON posts.id_posts = posts.id_posts";

    //     if ($category !== null) {
    //         $sql .= " WHERE category = :category";
    //     }

    //     $query = $this->connect()->prepare($sql);

    //     if ($category !== null) {
    //         $query->bindParam(":category", $category);
    //     }

    //     $query->execute();

    //     return $query->fetchAll(PDO::FETCH_ASSOC);
    // }
}
