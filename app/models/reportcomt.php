<?php

namespace app\models;

class reportcomt extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'reportId',
            'commentId',
        ];
    }

    public function addComtReport($data)
    {
        if (!empty($data['commentId']) && !empty($data['reportId'])) {
            $this->values = [
                $data['reportId'],
                $data["commentId"],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function getAllReportedComts()
    {
        $result = $this->select(['a.commentId, b.id, b.reason, b.active, b.created_at, c.userId as owner, c.content'])
            ->join('reports b', 'a.reportId=b.id', 'INNER')
            ->join('comments c', 'a.commentId=c.id', 'INNER')
            ->orderBy([['b.created_at', 'DESC']])
            // ->where([['b.active', 1, '<>'], ['c.active', 1, '<>']])
            ->get();
        return $result;
    }
}
