<?php

namespace app\models;

class intercomts extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'interId',
            'comtId',
            'userId',
        ];
    }

    public function interComt($data)
    {
        if (!empty($data['ownerId']) && !empty($data['interId']) && !empty($data['commentId'])) {
            $this->values = [
                $data['interId'],
                $data['commentId'],
                $data['ownerId'],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }
    
    public function notificationSeen($data)
    {
        $this->values['userId'] = $data['userId'];
        $result = $this
            ->where([['userId', $data['userId']]])
            ->update();
        return $result;
    }
}
