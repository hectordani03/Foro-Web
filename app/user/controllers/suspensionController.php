<?php

namespace user\controllers;

use user\models\mainModel;

class suspensionController extends mainModel
{

    public function user_suspencion($id_user)
    {

        date_default_timezone_set('America/Mexico_City');
        $suspension_time = date("Y-m-d H:i:s");
        $suspend_verification = $this->run_query("SELECT * FROM suspendedusers WHERE id_user =  '$id_user' ");
        $row_suspension = $suspend_verification->fetch();
        if ($suspension_time >= $row_suspension['suspension_period'] && $row_suspension['suspension_duration'] != "ban") {
            $user_suspended = "notsuspended";
        } else {
            $user_suspended = "suspended";
        }
        return $user_suspended;
    }

    public function suspencion_duration($id_user)
    {

        $suspend_verification = $this->run_query("SELECT * FROM suspendedusers WHERE id_user =  '$id_user' ");
        $row_suspension = $suspend_verification->fetch();
        if ($row_suspension['suspension_duration'] != "ban") {
            date_default_timezone_set('America/Mexico_City');
            $suspension_time = date("Y-m-d H:i:s");
            $suspension_timestamp = strtotime($suspension_time);
            $suspension_db_timestamp = strtotime($row_suspension['suspension_period']);
            $diference = $suspension_db_timestamp - $suspension_timestamp;
            $days = floor($diference / (60 * 60 * 24));
            $hours = floor(($diference % (60 * 60 * 24)) / (60 * 60));
            $minutes = floor(($diference % (60 * 60)) / 60);
            $duration = $days . ' days, ' . $hours . ':' . $minutes . ' hours';
        } else {
            $duration = "ban";
        }
        return $duration;
    }
}
