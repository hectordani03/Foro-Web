<?php

namespace app\models;

class comments extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'postId',
            'content',
            'commentId'
        ];
    }

    public function getComments(){
        $result = $this->select(['a.*'])
        ->join('posts b', 'a.postId=b.id', 'LEFT')
        ->join('user c', 'c.id=a.userId', 'LEFT')
        ->where([['c.active', 1]])
        ->orderBy([['a.created_at', 'DESC']])
        ->get();
        return $result;
    }
    
    public function getUserComments($params){

        $userId = $params[2];
        $result = $this->select(['a.*, b.*, c.username, d.profilePic'])
        ->join('posts b', 'a.postId=b.id')
        ->join('user c', 'b.userId=c.id')
        ->join('userinfo d', 'c.id=d.userId')
        ->where([['a.userId', $userId]])
        ->orderBy([['b.created_at', 'DESC']])
        ->get();
        return $result;
    }

    public function addComment($data, $params)
    {
        $userId = $params[2];
        $postId = $params[3];
        $this->values = [
            $userId,
            $postId,
            $data["content"],
            NULL
        ];
        return $this->insert();
    }
    
    public function replyComment($data, $params)
    {
        $userId = $params[2];
        $postId = $params[3];
        $commentId = $params[4];
        $this->values = [
            $userId,
            $postId,
            $data["content"],
            $commentId,
        ];
        return $this->insert();
    }

    public function deleteComment($data)
    {
        $this->where([['id', $data['commentId']]]);
        return $this->delete();
    }
}
