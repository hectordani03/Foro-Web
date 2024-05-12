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
}
