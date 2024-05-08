<?php

namespace app\models;

class userinfo extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'username',
            'email',
            'password'
        ];
    }

    public function getUserInfo($params)
    {
        $userId = $params[2];
        $result = $this->select(['*'])
            ->where([['userId', $userId]])
            ->get();
        return $result;
    }

    public function updateUserInfo($data, $params)
    {
        $userId = $params[2];
        $this->values = [
            'description' => sanitizeString($data["description"]),
            'age' => sanitizeString($data["age"]),
            'nacionality' => sanitizeString($data["nacionality"]),
            // 'profilePic' => $data["email"],
        ];
        $this->where([['userId', $userId]]);
        return $this->update();
    }
}
