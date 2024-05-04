<?php

namespace app\controllers;
use app\models\comments;

class CommentsController extends Controller
{
    public function getComments()
    {
        $comments = new comments();
        $result = $comments->getAllComments();
        echo $result;
    }

    // public function addComt()
    // {

    //     $id_post = sanitizeString($_POST['id_post']);
    //     $content = sanitizeString($_POST['content']);

    //     if ($content == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Comment can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif ($this->verifyData("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content)) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Comment do not match the requested format",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }

    //     session_start();
    //     $comment_data = [
    //         [
    //             "table_field" => "id_user",
    //             "param" => ":id_user",
    //             "field_value" => $_SESSION['id']
    //         ],
    //         [
    //             "table_field" => "id_post",
    //             "param" => ":id_post",
    //             "field_value" => $id_post
    //         ],
    //         [
    //             "table_field" => "content",
    //             "param" => ":content",
    //             "field_value" => $content
    //         ],
    //         [
    //             "table_field" => "date",
    //             "param" => ":date",
    //             "field_value" => date("Y-m-d")
    //         ],
    //     ];

    //     $addedcomment = $this->insertData("comments", $comment_data);

    //     if ($addedcomment['success']) {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Comment added",
    //             "text" => "Comment successfully added",
    //             "icon" => "success"
    //         ];
    //     } else {

    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to add comment, please try again",
    //             "icon" => "error"
    //         ];
    //     }

    //     return json_encode($alert);
    // }

    // public function replyComt()
    // {
    //     $id_post = sanitizeString($_POST['id_post']);
    //     $id_main_comment = sanitizeString($_POST['id_main_comment']);
    //     $content = sanitizeString($_POST['content']);

    //     if ($content == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Comment can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif ($this->verifyData("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content)) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Comment do not match the requested format",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }

    //     session_start();
    //     $comment_data = [
    //         [
    //             "table_field" => "id_user",
    //             "param" => ":id_user",
    //             "field_value" => $_SESSION['id']
    //         ],
    //         [
    //             "table_field" => "id_post",
    //             "param" => ":id_post",
    //             "field_value" => $id_post
    //         ],
    //         [
    //             "table_field" => "content",
    //             "param" => ":content",
    //             "field_value" => $content
    //         ],
    //         [
    //             "table_field" => "id_main_comment",
    //             "param" => ":id_main_comment",
    //             "field_value" => $id_main_comment
    //         ],
    //         [
    //             "table_field" => "date",
    //             "param" => ":date",
    //             "field_value" => date("Y-m-d")
    //         ],
    //     ];

    //     $addedcomment = $this->insertData("comments", $comment_data);

    //     if ($addedcomment['success']) {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Comment added",
    //             "text" => "Comment successfully added",
    //             "icon" => "success"
    //         ];
    //     } else {

    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to add comment, please try again",
    //             "icon" => "error"
    //         ];
    //     }

    //     return json_encode($alert);
    // }

    // public function updateComt()
    // {

    //     $id_comment = sanitizeString($_POST['id_comment']);
    //     $content = sanitizeString($_POST['content']);

    //     $data = $this->run_query("SELECT * FROM comments WHERE id_comment = '$id_comment' AND id_user = {$_SESSION['id']} ");
    //     if ($data->rowCount() <= 0) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "Unexpected Error",
    //             "text" => "User or Comment not found",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } else {
    //         $data = $data->fetch();
    //     }

    //     if ($content == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Comment can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif ($content != "") {

    //         if ($this->verifyData("/^[a-zA-Z0-9.,?!¡¿()\-\[\]{};:'\"<>@\$\€]*$/", $content)) {
    //             $alert = [
    //                 "type" => "simple",
    //                 "title" => "An unexpected error occurred",
    //                 "text" => "Comment do not match the requested format",
    //                 "icon" => "error"
    //             ];
    //             return json_encode($alert);
    //             exit();
    //         }
    //     }

    //     $post_update_data = [
    //         [
    //             "table_field" => "content",
    //             "param" => ":content",
    //             "field_value" => $content
    //         ]
    //     ];

    //     $condition = [
    //         "field_cond" => "id_comment",
    //         "param_cond" => ":id_comment",
    //         "cond_value" => $id_comment
    //     ];

    //     if ($this->updateData("comments", $post_update_data, $condition)) {

    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Comment Updated",
    //             "text" => "Comment has been successfully updated",
    //             "icon" => "success"
    //         ];
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to update comment, please try again",
    //             "icon" => "error"
    //         ];
    //     }
    //     return json_encode($alert);
    // }

    // public function reportComt()
    // {

    //     $id_comment = sanitizeString($_POST['id_comment']);
    //     $message = sanitizeString($_POST['content']);
    //     $reason = sanitizeString($_POST['reasonSelect']);

    //     if ($reason == "Other") {
    //         $reason = sanitizeString($_POST['reasonInput']);
    //     }

    //     if ($message == "" || $reason == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif ($this->verifyData("[a-zA-Z0-9]{4,20}", $message) && $this->verifyData("[a-zA-Z0-9]{4,20}", $reason)) {
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
    //             "table_field" => "id_reporting_user",
    //             "param" => ":ID_reporting_user",
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
    //             "table_field" => "id_comment",
    //             "param" => ":id_comment",
    //             "field_value" => $id_comment
    //         ]
    //     ];

    //     $ins_report_comt = $this->insertData("reportedcomments", $reported);

    //     if ($ins_report['success'] && $ins_report_comt['success']) {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Comment Reported",
    //             "text" => "Comment " . $id_comment . " has been reported",
    //             "icon" => "success"
    //         ];
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to report the comment" . $id_comment,
    //             "icon" => "error"
    //         ];
    //     }
    //     return json_encode($alert);
    // }

    // public function deleteComt()
    // {

    //     $id_comment = sanitizeString($_POST['id_comment']);
    //     $id_report = sanitizeString($_POST['id_report']);
    //     $message = sanitizeString($_POST['content']);
    //     $reason = sanitizeString($_POST['reason']);

    //     if ($message == "" || $reason == "") {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields can not be empty",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     } elseif ($this->verifyData("[a-zA-Z0-9]{4,20}", $message) && $this->verifyData("[a-zA-Z0-9]{4,20}", $reason)) {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Fields do not match the requested format",
    //             "icon" => "error"
    //         ];
    //         return json_encode($alert);
    //         exit();
    //     }

    //     $info_user_post = $this->run_query("SELECT * FROM user INNER JOIN comments ON comments.id_user = user.id_user WHERE comments.id_comment = $id_comment");
    //     $row = $info_user_post->fetch();

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


    //     $delete_comment = $this->deleteData("comments", "id_comment", $id_comment);

    //     if ($delete_comment->rowCount() == '1') {
    //         $alert = [
    //             "type" => "reload",
    //             "title" => "Comment deleted",
    //             "text" => "Comment " . $id_comment . " has been deleted",
    //             "icon" => "success"
    //         ];
    //     } else {
    //         $alert = [
    //             "type" => "simple",
    //             "title" => "An unexpected error occurred",
    //             "text" => "Failed to delete the comment" . $id_comment,
    //             "icon" => "error"
    //         ];
    //     }
    //     return json_encode($alert);
    // }
}
