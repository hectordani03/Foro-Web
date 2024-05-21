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
        if (!empty($data['userId']) && !empty($data['period']) && isset($data['duration'])) {
            $this->values = [
                $data["userId"],
                $data["period"],
                $data["duration"],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function deleteSuspension($data)
    {
        if (!empty($data['userId'])) {
            $this->where([['userId', $data['userId']]]);
            return $this->delete();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }
}
