<?php

namespace user\controllers;

use user\models\mainModel;

class userController extends mainModel
{

    //Controlador Registro de Usuario
    public function registerUser($user)
    {

        $username = $this->sanitizeString($_POST['username']);
        $email = $this->sanitizeString($_POST['email']);
        $password = $this->sanitizeString($_POST['password']);
        $confirm_password = $this->sanitizeString($_POST['confirm_password']);

        if ($user == "admin") {
            $role = $this->sanitizeString($_POST['role']);
        } elseif ($user == "user") {
            $role = "3";
        }
        if ($username == "" || $email == "" || $password == "" || $confirm_password == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "You have not completed all required fields",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($this->verifyData("[a-zA-Z0-9]{4,20}", $username)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The NAME does not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($this->verifyData("[a-zA-Z0-9$@.-]{7,100}", $password) || $this->verifyData("[a-zA-Z0-9$@.-]{7,100}", $confirm_password)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "PASSWORDS do not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($email != "") {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $check_email = $this->run_query("SELECT email FROM user WHERE email = '$email'");
                if ($check_email->rowCount() > 0) {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "The EMAIL you just entered is already registered in the system, please check and try again",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                }
            } else {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "You have entered an invalid email",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
        }
        if ($password != $confirm_password) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Passwords just entered do not match, please check and try again.",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } else {
            $encrypt_password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
        }

        if ($user == "admin") {
            $img_dir = "../../assets/profile_picture/";
            if ($_FILES['user_profile_photo']['name'] != "" && $_FILES['user_profile_photo']['size'] > 0) {
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

                if (mime_content_type($_FILES['user_profile_photo']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['user_profile_photo']['tmp_name']) != "image/png") {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "The image you have selected has an invalid format",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                }

                if (($_FILES['user_profile_photo']['size'] / 1024) > 5120) {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "The image you have selected exceeds the allowed weight",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                }

                $img = str_ireplace(" ", "_", $username);
                $img = $img . "_" . rand(0, 100);

                switch (mime_content_type($_FILES['user_profile_photo']['tmp_name'])) {

                    case 'image/jpeg':
                        $img = $img . ".jpg";
                        break;
                    case 'image/png':
                        $img = $img . ".png";
                        break;
                }

                chmod($img_dir, 0777);

                if (!move_uploaded_file($_FILES['user_profile_photo']['tmp_name'], $img_dir . $img)) {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "We cannot upload the image to the system at this time",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                }
            }
        } else {
            $img = "default.png";
        }

        $user_data = [
            [
                "table_field" => "username",
                "param" => ":Username",
                "field_value" => $username
            ],
            [
                "table_field" => "password",
                "param" => ":Password",
                "field_value" => $encrypt_password
            ],
            [
                "table_field" => "email",
                "param" => ":Email",
                "field_value" => $email
            ],
            [
                "table_field" => "id_role",
                "param" => ":Role",
                "field_value" => $role
            ],
            [
                "table_field" => "state",
                "param" => ":Status",
                "field_value" => '1'
            ],
            [
                "table_field" => "registration",
                "param" => ":Register",
                "field_value" => date("Y-m-d")
            ],
            [
                "table_field" => "profile_picture",
                "param" => ":Photo",
                "field_value" => $img
            ]
        ];

        $register_user = $this->insertData("user", $user_data);

        if ($register_user->rowCount() == 1) {
            $alert = [
                "type" => "reload",
                "title" => "User registered",
                "text" => "The user " . $username . " successfully registered",
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
                "text" => "Failed to register user, please try again",
                "icon" => "error"
            ];
        }

        return json_encode($alert);
    }

    public function deleteUser()
    {

        $id = $this->sanitizeString($_POST['id_user']);
        if ($id == '1') {
            $alert = [
                "type" => "simple",
                "title" => "Failed attempt",
                "text" => "Primary user cannot be deleted",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        $data = $this->run_query("SELECT * FROM user where id_user = '$id'");

        if ($data->rowCount() <= 0) {
            $alert = [
                "type" => "simple",
                "title" => "Error",
                "text" => "User does not exist",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } else {
            $data = $data->fetch();
        }

        $deleteUser = $this->deleteData("user", "id_user", $id);

        if ($deleteUser->rowCount() == '1') {
            if (is_file("../../assets/profile_picture/" . $data['profile_picture'])) {
                chmod("../../assets/profile_picture/" . $data['profile_picture'], 0777);
                unlink("../../assets/profile_picture//" . $data['profile_picture']);
            }

            $alert = [
                "type" => "reload",
                "title" => "User deleted",
                "text" => "User " . $data['username'] . " was successfully removed",
                "icon" => "success"
            ];
        } else {
            $alert = [
                "type" => "simple",
                "title" => "Unexpected error",
                "text" => "User " . $data['username'] . " could be deleted",
                "icon" => "error"
            ];
        }
        return json_encode($alert);
    }

    public function updateUser()
    {

        $id_user = $this->sanitizeString($_POST['id_user']);

        $data = $this->run_query("SELECT * FROM user WHERE id_user='$id_user'");
        if ($data->rowCount() <= 0) {
            $alert = [
                "type" => "simple",
                "title" => "Unexpected Error",
                "text" => "User not found",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } else {
            $data = $data->fetch();
        }

        $old_user = $this->sanitizeString($_POST['old_user']);
        $old_pass = $this->sanitizeString($_POST['old_pass']);

        if ($old_user == "" || $old_pass == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "You have not completed all required fields",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($this->verifyData("[a-zA-Z0-9]{4,20}", $old_user)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The NAME does not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($this->verifyData("[a-zA-Z0-9$@.-]{7,100}", $old_pass)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Password does not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }
        $check_user = $this->run_query("SELECT * FROM user WHERE username='$old_user' AND id_user='$id_user'");
        if ($check_user->rowCount() > 0) {

            $check_user = $check_user->fetch();

            if ($check_user['username'] != $old_user || !password_verify($old_pass, $check_user['password'])) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "Incorrect username or password",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }
        } else {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Username " . $old_user . "does not exists",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        $username = $this->sanitizeString($_POST['username']);
        $email = $this->sanitizeString($_POST['email']);
        $password = $this->sanitizeString($_POST['password']);
        $confirm_password = $this->sanitizeString($_POST['confirm_password']);

        if ($username == "" || $email == "") {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Fields cannot be empty",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif ($this->verifyData("[a-zA-Z0-9]{4,20}", $username)) {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "The NAME does not match the requested format",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            if ($email == $data['email']) {
                $check_email = $this->run_query("SELECT email FROM user WHERE email = '$email' AND id_user != '$id_user'");
                if ($check_email->rowCount() > 0) {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "EMAIL " . $email . " is already registered in the system, please check and try again",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                } 
            } else { 
                $check_email = $this->run_query("SELECT email FROM user WHERE email = '$email'");
                if ($check_email->rowCount() > 0) {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "EMAIL " . $email . " is already registered in the system, please check and try again",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                } 
            }
        } else {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "You have entered an invalid email",
                "icon" => "error"
            ];
            return json_encode($alert);
            exit();
        }

        if ($password != "" || $confirm_password != "") {
            if ($this->verifyData("[a-zA-Z0-9$@.-]{7,100}", $password) || $this->verifyData("[a-zA-Z0-9$@.-]{7,100}", $confirm_password)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "PASSWORDS do not match the requested format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            } else {
                if ($password != $confirm_password) {
                    $alert = [
                        "type" => "simple",
                        "title" => "An unexpected error occurred",
                        "text" => "Passwords just entered do not match, please check and try again.",
                        "icon" => "error"
                    ];
                    return json_encode($alert);
                    exit();
                } else {
                    $password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
                }
            }
        } else {
            $password = $data['password'];
        }

        if ($_FILES['user_profile_photo']['name'] != "" && $_FILES['user_profile_photo']['size'] > 0) {

            $img_dir = "../../assets/profile_picture/";

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

            if (mime_content_type($_FILES['user_profile_photo']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['user_profile_photo']['tmp_name']) != "image/png") {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected has an illegal format",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            if (($_FILES['user_profile_photo']['size'] / 1024) > 5120) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "The image you have selected exceeds the allowed weight",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            if ($data['profile_picture'] != "") {
                $img = explode(".", $data['profile_picture']);
                $img = $img[0];
            } else {
                $img = str_ireplace(" ", "_", $data['username']);
                $img = $img . "_" . rand(0, 100);
            }


            switch (mime_content_type($_FILES['user_profile_photo']['tmp_name'])) {
                case 'image/jpeg':
                    $img = $img . ".jpg";
                    break;
                case 'image/png':
                    $img = $img . ".png";
                    break;
            }

            chmod($img_dir, 0777);

            if (!move_uploaded_file($_FILES['user_profile_photo']['tmp_name'], $img_dir . $img)) {
                $alert = [
                    "type" => "simple",
                    "title" => "An unexpected error occurred",
                    "text" => "We cannot upload the image to the system at this time.",
                    "icon" => "error"
                ];
                return json_encode($alert);
                exit();
            }

            if (is_file($img_dir . $data['profile_picture']) && $data['profile_picture'] != $img) {
                chmod($img_dir . $data['profile_picture'], 0777);
                unlink($img_dir . $data['profile_picture']);
            }
        } elseif ($data['profile_picture'] != "") {
            $img = $data['profile_picture'];
        } else {
            $img = "default.png";
        }

        $user_update_data = [
            [
                "table_field" => "username",
                "param" => ":Username",
                "field_value" => $username
            ],
            [
                "table_field" => "password",
                "param" => ":Password",
                "field_value" => $password
            ],
            [
                "table_field" => "email",
                "param" => ":Email",
                "field_value" => $email
            ],
            [
                "table_field" => "profile_picture",
                "param" => ":Photo",
                "field_value" => $img
            ]
        ];

        $condition = [
            "field_cond" => "id_user",
            "param_cond" => ":id",
            "cond_value" => $id_user
        ];

        if ($this->updateData("user", $user_update_data, $condition)) {
            session_start();
            if ($id_user == $_SESSION['id']) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
            }
            $alert = [
                "type" => "reload",
                "title" => "User Updated",
                "text" => "User " . $username . " successfully updated",
                "icon" => "success"
            ];
        } else {
            $alert = [
                "type" => "simple",
                "title" => "An unexpected error occurred",
                "text" => "Failed to update user, please try again",
                "icon" => "error"
            ];
        }
        return json_encode($alert);
    }
}
