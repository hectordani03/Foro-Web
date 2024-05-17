<?php

namespace app\models;

class reportpost extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'reportId',
            'postId',
        ];
    }

    public function addPostReport($data){
        $this->values = [
            $data['reportId'],
            $data["postId"],
        ];
        return $this->insert();
    }

    public function getAllReportedPosts()
    {
        $result = $this->select(['c.id, b.reason, b.active, b.created_at, c.userId as owner, c.img'])
            ->join('reports b', 'a.reportId=b.id', 'INNER')
            ->join('posts c', 'a.postId=c.id', 'INNER')
            ->orderBy([['b.created_at', 'DESC']])
            // ->where([['b.active', 1, '<>'], ['c.active', 1, '<>']])
            ->get();
        return $result;
    }
}
