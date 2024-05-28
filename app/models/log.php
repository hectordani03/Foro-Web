<?php

namespace app\models;

class log extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'action',
        ];
    }

    public function logActions($data)
    {
        if (!empty($data['idUser']) && !empty($data['action'])) {
            $this->values = [
                $data['idUser'],
                $data['action'],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function getActivityLog()
    {
        $limitDate = date('Y-m-d H:i:s', strtotime('-5 days'));
        $result = $this->select(['a.action, a.created_at as date, b.username, c.profilePic as pic'])
            ->join('user b', 'a.userId=b.id', 'LEFT')
            ->join('userinfo c', 'b.id=c.userId')
            ->where([['a.created_at', $limitDate, '>=']])
            ->orderBy([['a.created_at', 'DESC']])
            ->limit(25)
            ->get();
        return $result;
    }
}
