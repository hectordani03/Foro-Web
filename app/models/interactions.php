<?php

namespace app\models;

class interactions extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'type',
        ];
    }

    public function logActions($data)
    {
        // if (!empty($data['idUser']) && !empty($data['action'])) {
        //     $this->values = [
        //         $data['idUser'],
        //         $data['action'],
        //     ];
        //     return $this->insert();
        // } else {
        //     echo json_encode(["r" => 'e']);
        //     return false;
        // }
    }

    public function getActivityLog()
    {
        // $limitDate = date('Y-m-d H:i:s', strtotime('-5 days'));
        // $result = $this->select(['a.action, a.created_at as date, b.username, c.profilePic as pic'])
        //     ->join('user b', 'a.userId=b.id', 'LEFT')
        //     ->join('userinfo c', 'b.id=c.userId')
        //     ->where([['a.created_at', $limitDate, '>=']])
        //     ->orderBy([['a.created_at', 'DESC']])
        //     ->limit(25)
        //     ->get();
        // return $result;
    }

    public function addInteraction($data){
        if (!empty($data['userId']) && !empty($data['type'])) {
            $this->values = [
                $data['userId'],
                $data['type'],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function deleteLike($data)
    {

        if (!empty($data['interId'])) {
            $this->where([['id', $data['interId']]]);
            return $this->delete();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function getUserNotifications($userId)
    {
        $result = $this->select([
            'a.type',
            'a.userId as actionUserId',
            'b.postId',
            'a.created_at',
            'c.username as actionUsername',
            'd.profilePic as actionUserProfilePic'
        ])
        ->join('interposts b', 'a.id = b.interId')
        ->join('user c', 'a.userId = c.id')
        ->join('userinfo d', 'c.id = d.userId')
        ->where([
            ['b.userId', $userId],
            ['b.seen', 0]
        ])
        ->orderBy([['a.created_at', 'DESC']])
        ->get();

        return $result;
    }

    public function countUserNotifications($userId)
    {
        $result = $this->select(["b.userId"])
            ->join('interposts b', 'a.id = b.interId')
            ->where([
                ['b.userId', $userId],
                ['b.seen', 0],
                ['a.userId', $userId, '<>']
            ])
            ->count('a.id')
            ->get();

        return $result;
    }

    public function getTotalInteractionsUntil($limitDate) {
        $result = $this->select(['count(*) as tt'])
            ->where([
                ['created_at', $limitDate, '<='],
                ['type', 'like']
                ])
            ->get();
        return $result;
    }

    public function getNewInteractions($limitDate) {
        $result = $this->select(['count(*) as tt'])
            ->where([
                ['created_at', $limitDate, '>'],
                ['type', 'like']
                ])
            ->get();
        return $result;
    }
}
