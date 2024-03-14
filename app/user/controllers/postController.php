<?php

namespace user\controllers;

use user\models\mainModel;


class postController extends mainModel
{

    public function addPost()
    {

        $id_user = $this->sanitizeString($_POST['id_user']);
        $content = $this->sanitizeString($_POST['content']);
        $category = $this->sanitizeString($_POST['category']);

        if ($content == "" && $category == "" && $_FILES['post_img']['name'] == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields can not be empty",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif ($this->verifyData("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content) && $this->verifyData("/^[a-zA-Z]{4,20}$/", $category)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields do not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        $img_dir = "../../assets/post_img/";
        if ($_FILES['post_img']['name'] != "" && $_FILES['post_img']['size'] > 0) {
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

            if (mime_content_type($_FILES['post_img']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['post_img']['tmp_name']) != "image/png") {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected has an invalid format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            if (($_FILES['post_img']['size'] / 1024) > 5120) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected exceeds the allowed weight",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            $img = str_ireplace(" ", "_", $id_user);
            $img = $img . "_" . rand(0, 100);

            switch (mime_content_type($_FILES['post_img']['tmp_name'])) {

                case 'image/jpeg':
                    $img = $img . ".jpg";
                    break;
                case 'image/png':
                    $img = $img . ".png";
                    break;
            }

            chmod($img_dir, 0777);

            if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $img_dir . $img)) {
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

        $post_data = [
            [
                "table_field" => "id_user",
                "param" => ":id_user",
                "field_value" => $id_user
            ],
            [
                "table_field" => "content",
                "param" => ":content",
                "field_value" => $content
            ],
            [
                "table_field" => "category",
                "param" => ":category",
                "field_value" => $category
            ],
            [
                "table_field" => "state",
                "param" => ":state",
                "field_value" => '1'
            ],
            [
                "table_field" => "img",
                "param" => ":img",
                "field_value" => $img
            ],
            [
                "table_field" => "date",
                "param" => ":date",
                "field_value" => date("Y-m-d")
            ],

        ];

        $addedpost = $this->insertData("posts", $post_data);

        if ($addedpost->rowCount() == 1) {
            $alert = [
                "type" => "reload",
                "title" => "Post added",
                "text" => "Post successfully added",
                "icon" => "success"
            ];
        } else {

            if (is_file($img_dir . $img)) {
                chmod($img_dir . $img, 0777);
                unlink($img_dir . $img);
            }

            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Failed to add post, please try again",
                "icon" => "error"
            ];
        }

        return json_encode($alert);
    }

    public function sharePost()
    {

        $id_post = $this->sanitizeString($_POST['id_post']);
        $id_user = $this->sanitizeString($_POST['id_user']);
        $content = $this->sanitizeString($_POST['content']);
        $category = $this->sanitizeString($_POST['category']);

        if ($content == "" && $category == "" && $_FILES['post_img']['name'] == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields can not be empty",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif ($content != "") {

            if ($this->verifyData("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content) && $this->verifyData("/^[a-zA-Z]{4,20}$/", $category)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "Fields do not match the requested format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
        }
        $img_dir = "../../assets/post_img/";
        if ($_FILES['post_img']['name'] != "" && $_FILES['post_img']['size'] > 0) {
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

            if (mime_content_type($_FILES['post_img']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['post_img']['tmp_name']) != "image/png") {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected has an invalid format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            if (($_FILES['post_img']['size'] / 1024) > 5120) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected exceeds the allowed weight",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            $img = str_ireplace(" ", "_", $id_user);
            $img = $img . "_" . rand(0, 100);

            switch (mime_content_type($_FILES['post_img']['tmp_name'])) {

                case 'image/jpeg':
                    $img = $img . ".jpg";
                    break;
                case 'image/png':
                    $img = $img . ".png";
                    break;
            }

            chmod($img_dir, 0777);

            if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $img_dir . $img)) {
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

        $post_data = [
            [
                "table_field" => "id_user",
                "param" => ":id_user",
                "field_value" => $id_user
            ],
            [
                "table_field" => "content",
                "param" => ":content",
                "field_value" => $content
            ],
            [
                "table_field" => "category",
                "param" => ":category",
                "field_value" => $category
            ],
            [
                "table_field" => "state",
                "param" => ":state",
                "field_value" => '1'
            ],
            [
                "table_field" => "img",
                "param" => ":img",
                "field_value" => $img
            ],
            [
                "table_field" => "date",
                "param" => ":date",
                "field_value" => date("Y-m-d")
            ],

        ];

        $sharedpost = $this->insertData("posts", $post_data);

        if ($sharedpost->rowCount() > 0) {
            $alert = [
                "type" => "reload",
                "title" => "Post shared",
                "text" => "Post successfully shared",
                "icon" => "success"
            ];
        } else {

            if (is_file($img_dir . $img)) {
                chmod($img_dir . $img, 0777);
                unlink($img_dir . $img);
            }

            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Failed to share post, please try again",
                "icon" => "error"
            ];
        }

        return json_encode($alert);
    }

    public function updatePost()
    {

        $id_post = $this->sanitizeString($_POST['id_post']);
        $id_user = $this->sanitizeString($_POST['id_user']);
        $content = $this->sanitizeString($_POST['content']);
        $category = $this->sanitizeString($_POST['category']);

        $data = $this->run_query("SELECT * FROM posts WHERE id_post = '$id_post' AND id_user = '$id_user");
        if ($data->rowCount() <= 0) {
            $alert = [
                "type" => "simple",
                "title" => "Unexpected Error",
                "text" => "User or Post not found",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } else {
            $data = $data->fetch();
        }

        if ($content == "" && $category == "" && $_FILES['post_img']['name'] == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields can not be empty",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif ($content != "") {

            if ($this->verifyData("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content) && $this->verifyData("/^[a-zA-Z]{4,20}$/", $category)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "Fields do not match the requested format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
        }
        $img_dir = "../../assets/post_img/";
        if ($_FILES['post_img']['name'] != "" && $_FILES['post_img']['size'] > 0) {
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

            if (mime_content_type($_FILES['post_img']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['post_img']['tmp_name']) != "image/png") {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected has an invalid format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            if (($_FILES['post_img']['size'] / 1024) > 5120) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected exceeds the allowed weight",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            $img = str_ireplace(" ", "_", $id_user);
            $img = $img . "_" . rand(0, 100);

            switch (mime_content_type($_FILES['post_img']['tmp_name'])) {

                case 'image/jpeg':
                    $img = $img . ".jpg";
                    break;
                case 'image/png':
                    $img = $img . ".png";
                    break;
            }

            chmod($img_dir, 0777);

            if (!move_uploaded_file($_FILES['post_img']['tmp_name'], $img_dir . $img)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "We cannot upload the image to the system at this time",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
            if (is_file($img_dir . $data['img']) && $data['img'] != $img) {
                chmod($img_dir . $data['img'], 0777);
                unlink($img_dir . $data['img']);
            }

        } elseif ($data['img'] != "") {
            $img = $data['img'];
        } 
           
        $post_update_data = [
            [
                "table_field" => "content",
                "param" => ":content",
                "field_value" => $content
            ],
            [
                "table_field" => "category",
                "param" => ":category",
                "field_value" => $category
            ],
            [
                "table_field" => "img",
                "param" => ":img",
                "field_value" => $img
            ]
        ];

        $condition = [
            "field_cond" => "id_post",
            "param_cond" => ":id_post",
            "cond_value" => $id_post
        ];

        if ($this->updateData("posts", $post_update_data, $condition)) {

            $alert = [
                "type" => "reload",
                "title" => "Post Updated",
                "text" => "Post has been successfully updated",
                "icon" => "success"
            ];
        } else {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Failed to update post, please try again",
                "icon" => "error"
            ];
        }
        return json_encode($alert);
    }

    public function reportPost()
    {

        $id_post = $this->sanitizeString($_POST['id_post']);
        $id_user = $this->sanitizeString($_POST['id_user']);
        $message = $this->sanitizeString($_POST['message']);
        $category = $this->sanitizeString($_POST['category']);
        $state = $this->sanitizeString($_POST['state']);
        $reason = $this->sanitizeString($_POST['reason']);

        if ($reason == "Other") {
            $reason = $this->sanitizeString($_POST['reasonInput']);
        }

        if ($message == "" || $category == "" || $state == "" || $reason == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields can not be empty",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif ($this->verifyData("[a-zA-Z0-9]{4,20}", $message) && $this->verifyData("[a-zA-Z0-9]{4,20}", $category)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields do not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        session_start();
        $report = [
            [
                "table_field" => "id_reporting_user",
                "param" => ":ID_reporting_user",
                "field_value" => $_SESSION['id']
            ],
            [
                "table_field" => "reason",
                "param" => ":Reason",
                "field_value" => $reason
            ],
            [
                "table_field" => "state",
                "param" => ":State",
                "field_value" => '0'
            ]
        ];

        $ins_report = $this->insertData("reports", $report);

        // $reported_last_id = $this->connect()->lastInsertId();

        // $reported = [
        //     [
        //         "table_field" => "id_report",
        //         "param" => ":id_report",
        //         "field_value" => $reported_last_id
        //     ],
        //     [
        //         "table_field" => "id_post",
        //         "param" => ":id_post",
        //         "field_value" => $id_post
        //     ]
        // ];

        // $ins_report_post = $this->insertData("reportedposts", $reported);

        // if ($ins_report->rowCount() == 1 && $ins_report_post->rowCount() == 1) {

        if ($ins_report->rowCount() > 0) {
            $alert = [
                "type" => "reload",
                "title" => "Post Reported",
                "text" => "Post " . $id_post . " has been reported",
                "icon" => "success"
            ];
        } else {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Failed to report the post" . $id_post,
                "icon" => "error"
            ];
        }
        return json_encode($alert);
    }

    public function deletePost()
    {

        $id_post = $this->sanitizeString($_POST['id_post']);
        $message = $this->sanitizeString($_POST['message']);
        $category = $this->sanitizeString($_POST['category']);
        $reason = $this->sanitizeString($_POST['reason']);

        if ($message == "" || $category == "" || $reason == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields can not be empty",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif ($this->verifyData("[a-zA-Z0-9]{4,20}", $message) && $this->verifyData("[a-zA-Z0-9]{4,20}", $category)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields do not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        $info_user_post = $this->run_query("SELECT * FROM user INNER JOIN posts ON posts.id_user = user.id_user");
        $row = $info_user_post->fetch();

        // SEND EMAIL HERE


        $delete_post = $this->deleteData("post", "id_post", $id_post);

        if ($delete_post->rowCount() == '1') {
            if (is_file("../../assets/post_img/" . $row['img'])) {
                chmod("../../assets/post_img/" . $row['img'], 0777);
                unlink("../../assets/post_img//" . $row['img']);
            }
            $alert = [
                "type" => "reload",
                "title" => "Post Reported",
                "text" => "Post " . $id_post . " has been deleted",
                "icon" => "success"
            ];
        } else {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Failed to delete the post" . $id_post,
                "icon" => "error"
            ];
        }
        return json_encode($alert);
    }
}
