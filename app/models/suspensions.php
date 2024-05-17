<?php

namespace app\models;

class suspensions extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->connect();
        $this->fillable = [
            'userId',
            'period',
            'duration',
        ];
    }

    public function addSuspension($data)
    {
        $this->values = [
            $data["userId"],
            $data["period"],
            $data["duration"],
        ];
        return $this->insert();
    }

    public function deleteSuspension($data)
    {
        $this->where([['userId', $data['userId']]]);
        return $this->delete();
    }
}
