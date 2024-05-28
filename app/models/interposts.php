<?php

namespace app\models;

class interposts extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'interId',
            'postId',
            'userId',
        ];
    }

    public function interPost($data)
    {
        if (!empty($data['ownerId']) && !empty($data['interId']) && !empty($data['postId'])) {
            $this->values = [
                $data['interId'],
                $data['postId'],
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
