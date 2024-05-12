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

    public function getAllReportedUsers()
    {
        $result = $this->select(['a.userId as reportedUser, b.*, c.active as active_user'])
            ->join('reports b', 'a.reportId=b.id')
            ->join('user c', 'a.userId=c.id')
            ->where([['b.active', 1]])
            ->get();
        return $result;
    }
}
