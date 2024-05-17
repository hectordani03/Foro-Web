<?php

namespace app\models;

class reports extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'reason',
        ];
    }

    public function addReport($data){
        $this->values = [
            $data['userId'],
            $data["reason"],
        ];
        return $this->insert();
    }

    public function updateReportStatus($data)
    {
        $this->values = [
            'active' => $data['activer'],
        ];
        $this->where([['id', $data['reportId']]]);

        return $this->update();
    }
}
