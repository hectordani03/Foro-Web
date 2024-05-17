<?php

namespace app\models;

class reportuser extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'reportId',
            'userId',
        ];
    }

    public function addUserReport($data)
    {
        $this->values = [
            $data['reportId'],
            $data["userId"],
        ];
        return $this->insert();
    }

    public function deleteReportUser($data)
    {
        $this->where([['userId', $data['userId']]]);
        return $this->delete();
    }

    public function getAllReportedUsers()
    {
        $result = $this->select(['a.userId as reportedUser, b.*, c.active as active_user, c.email,c.username, d.userId as suspendedUser'])
            ->join('reports b', 'a.reportId=b.id', 'INNER')
            ->join('user c', 'a.userId=c.id', 'INNER')
            ->join('suspensions d', 'c.id=d.userId', 'LEFT')
            ->orderBy([['b.created_at', 'DESC']])
            // ->where([['b.active', 1, '<>'], ['c.active', 1, '<>']])
            ->get();
        return $result;
    }
}
