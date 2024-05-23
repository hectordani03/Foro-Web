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
        if (!empty($data['userId']) && isset($data['period']) && isset($data['duration'])) {
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

    public function getTotalSpUntil($date)
    {
        $result = $this->select(['id'])
        ->count('id')
        ->where([['period', $date, '<='], ['duration', 0]])
        ->get();
        return $result;
    }

    public function getnewSp($date)
    {
        $result = $this->select(['id'])
        ->count('id')
        ->where([['period', $date,'>'], ['duration', 0]])
        ->get();
        return $result;
    }
    
}
