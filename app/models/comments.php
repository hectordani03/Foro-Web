<?php

namespace app\models;

class comments extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();

    }

    public function getAllComments(){

        $result = $this->select(['a.*, b.*, c.id, c.username, d.profilePic'])
        ->join('posts b', 'a.postId=b.id')
        ->join('user c', 'b.userId=c.id')
        ->join('userinfo d', 'c.id=d.userId')
        ->where([['c.active', 1]])
        ->orderBy([['a.created_at', 'DESC']])
        ->get();
    return $result;
    }
}
