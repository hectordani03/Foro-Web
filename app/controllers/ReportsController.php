<?php

namespace app\controllers;

use app\classes\View;
use app\classes\redirect;
use app\controllers\auth\LoginController as session;
use app\models\reports;
use app\models\reportUser;
use app\models\reportPost;
use app\models\reportComt;

class ReportsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function users($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/reportedusers', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function posts($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/reportedposts', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function comments($params = null)
    {
        $ua = session::sessionValidate();
        if (is_null($ua) || $ua['role'] == 3) {
            redirect::to('');
            exit();
        }
        View::render('admin/reportedcomts', ['ua' => $ua, 'title' => 'For Us']);
    }

    public function getReportedUsers()
    {
        $reportUser = new reportUser();
        $result = $reportUser->getAllReportedUsers();
        echo $result;
    }

    public function createReport()
    {
        $report = new reports;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        if ($data['reason'] == "Other") {
            $data['reason'] = $data['other'];
        }
        $data['userId'] = session::sessionValidate()['id'];
        $res = $report->addReport($data);
        return $res;
    }

    public function reportUser()
    {
        $report = new reportuser;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        $data['reportId'] = $this->createReport();
        $res = $report->addUserReport($data);
        echo json_encode(["r" => $res]);
    }

    public function reportPost()
    {
        $report = new reportpost;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        $data['reportId'] = $this->createReport();
        $res = $report->addPostReport($data);
        echo json_encode(["r" => $res]);
    }
    
    public function reportComment()
    {
        $report = new reportcomt;
        $data = filter_input_array(sanitizeString(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
        $data['reportId'] = $this->createReport();
        $res = $report->addComtReport($data);
        echo json_encode(["r" => $res]);
    }
}
