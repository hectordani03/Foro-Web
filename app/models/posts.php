<?php

namespace app\models;

class posts extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'text',
            'category',
            'img'
        ];
    }

    public function addPosts($data, $params)
    {
        $idUser = $params[2];
        $this->values = [
            $idUser,
            $data["text"],
            $data["category"],
            getImg("img")
        ];
        return $this->insert();
    }

    public function getAllPosts()
    {
        $result = $this->select(['a.*, b.username, c.profilePic'])
            ->join('user b', 'a.userId=b.id')
            ->join('userinfo c', 'b.id=c.userId')
            ->where([['b.active', 1]])
            ->orderBy([['a.created_at', 'DESC']])
            ->get();
        return $result;
    }

    public function getUserPosts($params)
    {
        $idUser = $params[2];
        $result = $this->select(['a.*, b.username, c.profilePic'])
            ->join('user b', 'a.userId=b.id')
            ->join('userinfo c', 'b.id=c.userId')
            ->where([['a.userId', $idUser]])
            ->orderBy([['a.created_at', 'DESC']])
            ->get();
        return $result;
}
}
