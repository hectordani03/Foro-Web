<?php

namespace app\models;

class user extends Model
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

    public function registerUser($data)
    {
        $this->values = [
            $data["username"],
            $data["email"],
            password_hash($data["password"], PASSWORD_BCRYPT, ["cost" => 10])
        ];
        return $this->insert();
    }

    public function getAllUsers($limit = 5)
    {
        $result = $this->select(['a.*, b.profilePic'])
            ->join('userinfo b', 'a.id=b.userId')
            ->where([['a.active', 1]])
            ->orderBy([['a.registered_at', 'DESC']])
            ->limit($limit)
            ->get();
        return $result;
    }

    public function getUserInfo($params)
    {
        $userId = $params[2];
        $result = $this->select(['a.id, a.username, a.email, a.role, a.active, a.registered_at, b.*'])
            ->join('userinfo b', 'a.id=b.userId')
            ->where([['a.id', $userId]])
            ->get();
        return $result;
    }

    public function updateProfUser($data, $params)
    {
        $userId = $params[2];
        $this->values = [
            'username' => $data["username"],
            'email' => $data["email"],
        ];
        $this->where([['id', $userId]]);
        return $this->update();
    }
}
