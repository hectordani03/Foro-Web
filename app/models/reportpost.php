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

    public function addPostReport($data)
    {
        if (!empty($data['postId']) && !empty($data['reportId'])) {
            $this->values = [
                $data['reportId'],
                $data["postId"],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
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
