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
            'password',
            'role'
        ];
    }

    public function registerUser($data)
    {
        $this->values = [
            sanitizeString($data["username"]),
            sanitizeString($data["email"]),
            password_hash(sanitizeString($data["password"]), PASSWORD_BCRYPT, ["cost" => 10]),
            isset($data["role"]) ? sanitizeString($data["role"]) : 3,
        ];
        return $this->insert();
    }

    public function getAllUsers($data, $limit = 5)
    {
        $result = $this->select(['a.id, a.username, a.email, a.role, a.active, a.registered_at, b.profilePic'])
            ->join('userinfo b', 'a.id=b.userId')
            ->where([['a.active', 1], ['a.id', $data['userId'], '<>']]);

        if ($data['roleId'] == 1 && $data['userId'] == 1) {
        } elseif ($data['roleId'] == 1) {
            $result->where([['a.role', 1, '<>']]);
        } else {
            $result->where([['a.role', 3]]);
        }

        $result = $this->orderBy([['a.registered_at', 'DESC']])
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

    public function updateProfUser($data)
    {
        $this->values = [
            'username' => sanitizeString($data["username"]),
            'email' => sanitizeString($data["email"]),
        ];

        if (isset($data["password"]) && $data["password"] != "") {
            $this->values['password'] = password_hash(sanitizeString($data["password"]), PASSWORD_BCRYPT, ["cost" => 10]);
        } else {
            unset($this->values['password']);
        }

        $this->where([['id', $data['userId']]]);
        $result = $this->update();

        $_SESSION['username'] = $this->values['username'];
        $_SESSION['email'] = $this->values['email'];
        session_write_close();
        return $result;
    }

    public function deleteUser($data)
    {
        $this->where([['id', $data['userId']]]);
        return $this->delete();
    }
}
