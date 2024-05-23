<?php

namespace app\controllers;

use app\models\log;

class LogController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getLog()
    {
        $log = new log;
        $activity = $log->getActivityLog();
        echo $activity;
       
    }
}