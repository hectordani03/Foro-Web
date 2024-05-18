<?php

namespace app\models;

class userinfo extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
        ];
    }

    public function registerUserInfo($userId)
    {
        if (isset($userId)) {
            $this->values = [
                $userId,
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function getUserInfo($params)
    {
        $userId = $params[2];
        $result = $this->select(['*'])
            ->where([['userId', $userId]])
            ->get();
        return $result;
    }

    public function updateUserInfo($data)
    {
        if (!empty($data['userId'])) {
            session_start();

            if (isset($data["description"]) && $data["description"] != "") {
                $this->values['description'] = sanitizeString($data["description"]);
                $_SESSION['description'] = $this->values['description'];
            }
            if (isset($data["age"]) && $data["age"] != "") {
                $this->values['age'] = sanitizeString($data["age"]);
                $_SESSION['age'] = $this->values['age'];
            }
            if (isset($data["nacionality"]) && $data["nacionality"] != "") {
                $this->values['nacionality'] = sanitizeString($data["nacionality"]);
                $_SESSION['nacionality'] = $this->values['nacionality'];
            }
            if (isset($_FILES["profilePic"]) && $_FILES["profilePic"]['name'] != "" && $_FILES["profilePic"]['size'] > 0 && $_FILES["profilePic"] != "") {
                $this->values['profilePic'] = getUserImg("profilePic");
                $_SESSION['profilePic'] = $this->values['profilePic'];
            }
            if (!empty($this->values)) {

                $result = $this->where([['userId', $data['userId']]])->update();
                return $result;
            }
            session_write_close();
            return false;
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }
}
