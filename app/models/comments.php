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

    public function addComment($data)
    {
        if (!empty($data['content']) && !empty($data['userId']) && !empty($data['postId'])) {
            $this->values = [
                $data['userId'],
                $data['postId'],
                $data['content'],
                NULL
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function addReply($data)
    {
        if (!empty($data['content']) && !empty($data['userId']) && !empty($data['postId'])) {
            $this->values = [
                $data['userId'],
                $data['postId'],
                $data['content'],
                $data['commentId']
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function deleteComment($data)
    {
        if (!empty($data['commentId'])) {
            $this->where([['id', $data['commentId']]]);
            return $this->delete();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function getComments()
    {
        $result = $this->select(['a.*'])
            ->join('posts b', 'a.postId=b.id', 'LEFT')
            ->join('user c', 'c.id=a.userId', 'LEFT')
            ->orderBy([['a.created_at', 'DESC']])
            ->get();
        return $result;
    }

    public function getUserComments($data)
    {
        $result = $this->select(['a.*, b.*, c.username, d.profilePic'])
            ->join('posts b', 'a.postId=b.id')
            ->join('user c', 'b.userId=c.id')
            ->join('userinfo d', 'c.id=d.userId')
            ->where([['a.userId', $data['userId']]])
            ->orderBy([['b.created_at', 'DESC']])
            ->get();
        return $result;
    }

    public function getPostComments($params)
    {
        $postId = $params[2];
        $result = $this->select([
            'a.*', 
            'c.username', 
            'd.profilePic', 
            'e.content as sonContent', 
            'f.username as sonUsername', 
            'g.profilePic as sonProfilePic'
        ])
        ->join('posts b', 'a.postId=b.id')
        ->join('user c', 'a.userId = c.id')
        ->join('userinfo d', 'c.id = d.userId')
        ->join('comments e', 'a.id = e.commentId', 'LEFT')
        ->join('user f', 'e.userId = f.id', 'LEFT') 
        ->join('userinfo g', 'f.id = g.userId', 'LEFT')
        ->where([['b.id', $postId]])
        ->orderBy([['a.created_at', 'DESC']])
        ->get();
       
        return $result;
    }
    
}
