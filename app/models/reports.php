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

    public function addReport($data)
    {
        if (!empty($data['reason']) && !empty($data['userId'])) {

            if ($data['reason'] == "Other") {
                $data['reason'] = $data['other'];
            }
            $this->values = [
                $data['userId'],
                $data["reason"],
            ];
            return $this->insert();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }

    public function updateReportStatus($data)
    {
        
        if (!empty($data['activer']) && !empty($data['reportId'])) {
            $this->values = [
                'active' => $data['activer'],
            ];
            $this->where([['id', $data['reportId']]]);

            return $this->update();
        } else {
            echo json_encode(["r" => 'e']);
            return false;
        }
    }
}
