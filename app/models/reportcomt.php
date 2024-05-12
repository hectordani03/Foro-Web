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

    public function addComtReport($data){
        $this->values = [
            $data['reportId'],
            $data["commentId"],
        ];
        return $this->insert();
    }
}
